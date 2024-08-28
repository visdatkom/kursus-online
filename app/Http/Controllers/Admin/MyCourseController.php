<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use setasign\Fpdi\Fpdi;
class MyCourseController extends Controller
{
    private function isCorrectAnswer($questionId, $answerId)
    {
        $correctAnswer = QuestionOption::query()
            ->where('question_id', $questionId)
            ->where('is_correct', true)
            ->first();

        return $correctAnswer && $correctAnswer->id == $answerId;
    }

    public function index(Request $request)
    {
        // tampung data user yang sedang login kedalam variabel $user.
        $user = $request->user();

        /*
            tampung data transaction detail kedalam variabel $course, kemudian kita memanggil relasi menggunakan with,
            selanjutnya kita melakukan sebuah query untuk mengambil data transaction yang memiliki status success dan seusai dengan user yang sedang login, selanjutnya kita juga melakukan query untuk pencarian data berdasarkan course name, kemudian kita pecah data transaction detail yang kita tampilkan hanya 3 per halaman
            dengan urutan terbaru.
        */
        $courses = TransactionDetail::with('transaction', 'course.reviews', 'course.quizes')
                ->whereHas('transaction', function($query) use($user){
                    $query->where('user_id', $user->id)->where('status', 'success');
                })->whereHas('course', function($query){
                    $query->where('name', 'like', '%'. request()->search .'%');
                })->latest()->paginate(3)->withQueryString();

        $quizAttempt = QuizAttempt::with('quiz')->whereUserId($request->user()->id)->get();

        $score = [];
        foreach($quizAttempt as $attempt)
            $score[$attempt->quiz->course_id.'-'.$attempt->user_id] = [
                'score' => $attempt->score,
                'minimum_score' => $attempt->quiz->minimum_score
            ];

        // passing variabel $courses kedalam view.
        return view('admin.course.mycourse', compact('courses', 'score'));
    }

    public function quiz($id)
    {
        $course = Course::findOrFail($id);

        $quiz = Quiz::whereCourseId($course->id)->first();

        $quizAttempt = QuizAttempt::whereUserId(auth()->user()->id)->whereQuizId($quiz->id)->latest()->first();

        if($quiz)
            return view('admin.course.quiz', compact('course', 'quiz', 'quizAttempt'));
        else
            return back()->with('toast_error', 'Quiz saat ini belum tersedia');
    }

    public function quizStore(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $quiz = Quiz::whereCourseId($course->id)->first();

        $quizAttempt = $request->user()->quizAttempts()->create([
            'quiz_id' => $quiz->id,
            'score' => 0,
        ]);

        $totalScore = 0;

        foreach ($request->answers as $questionId => $answerId) {
            $isCorrect = $this->isCorrectAnswer($questionId, $answerId);

            $quizAttempt->quizAttemptDetails()->create([
                'question_id' => $questionId,
                'answer' => $answerId,
                'is_correct' => $isCorrect
            ]);

            if ($isCorrect)
                $totalScore += 10;
        }

        $quizAttempt->update(['score' => $totalScore]);

        return redirect()->route('admin.mycourse')->with('toast_success', 'Quiz telah disimpan!');
    }

    public function certificate($id)
    {
        $course = Course::findOrFail($id);
        $user = auth()->user();

        $templatePath = public_path('template.pdf');

        $pdf = new FPDI();

        $pdf->setSourceFile($templatePath);
        $template = $pdf->importPage(1);
        $pdf->AddPage('L');
        $pdf->useTemplate($template);

        $pdf->SetFont('Arial', 'i', 24);

        $pdf->SetXY(5, 100);
        $pdf->Cell(0, 10, $user->name, 0, 1, 'C');

        $pdf->SetFont('Arial', 'I', 24);
        $pdf->SetXY(75, 120);
        $maxWidth = 150;
        $pdf->MultiCell($maxWidth, 10, $course->name, 0, 'C');

        return response()->streamDownload(fn() => $pdf->Output(), 'Certificate-' . $course->slug . '.pdf');
    }
}
