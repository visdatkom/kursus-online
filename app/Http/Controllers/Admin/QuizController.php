<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionOption;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizez = Quiz::with('course')->withCount('questions')
            ->latest()->paginate(10)->withQueryString();

        return view('admin.quizzes.index', compact('quizez'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::orderBy('name')->get();

        return view('admin.quizzes.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required',
            'minimum_score' => 'required',
        ]);

        Quiz::updateOrCreate([
            'course_id' => $request->course_id,
        ], [
            'title' => $request->title,
            'description' => $request->description,
            'minimum_score' => $request->minimum_score,
        ]);

        return redirect(route('admin.quiz.index'))->with('toast_success', 'Quiz Berhasil Dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $courses = Course::orderBy('name')->get();

        return view('admin.quizzes.edit', compact('quiz', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required',
            'minimum_score' => 'required',
        ]);

        $quiz->update([
            'title' => $request->title,
            'description' => $request->description,
            'minimum_score' => $request->minimum_score,
        ]);

        return redirect(route('admin.quiz.index'))->with('toast_success', 'Quiz Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return back()->with('toast_success', 'Quiz berhasil dihapus');
    }

    public function questionIndex(Quiz $quiz)
    {
        $quiz->load('questions');

        return view('admin.quizzes.question', compact('quiz'));
    }

    public function questionCreate(Quiz $quiz)
    {
        return view('admin.quizzes.question-create', compact('quiz'));
    }

    public function questionStore(Quiz $quiz, Request $request)
    {
        $validatedData = $request->validate([
            'question_text' => 'required|string',
            'answers' => 'required|array',
            'answers.*.choice_text' => 'required|string',
            'answers.*.is_correct' => 'required|boolean',
        ]);

        $question = $quiz->questions()->create([
            'title' => $validatedData['question_text'],
        ]);

        foreach ($validatedData['answers'] as $answer) {
            QuestionOption::create([
                'question_id' => $question->id,
                'title' => $answer['choice_text'],
                'is_correct' => $answer['is_correct'],
            ]);
        }

        return redirect()->route('admin.quiz.questions.index', $quiz->id)->with('toast_success', 'Pertanyaan berhasil disimpan.');
    }

    public function questionEdit(Quiz $quiz, Question $question)
    {
        return view('admin.quizzes.question-edit', compact('quiz', 'question'));
    }

    public function questionUpdate(Quiz $quiz, Question $question, Request $request)
    {
        $validatedData = $request->validate([
            'question_text' => 'required|string',
            'answers' => 'required|array',
            'answers.*.choice_text' => 'required|string',
            'answers.*.is_correct' => 'required|boolean',
        ]);

        $question->update([
            'title' => $validatedData['question_text'],
        ]);

        $question->options()->delete();

        foreach ($validatedData['answers'] as $answer) {
            QuestionOption::create([
                'question_id' => $question->id,
                'title' => $answer['choice_text'],
                'is_correct' => $answer['is_correct'],
            ]);
        }

        return redirect()->route('admin.quiz.questions.index', $quiz->id)->with('toast_success', 'Pertanyaan berhasil diubah.');
    }

    public function questionDestroy(Quiz $quiz, Question $question)
    {
        $question->delete();

        return redirect()->route('admin.quiz.questions.index', $quiz->id)->with('toast_success', 'Pertanyaan berhasil dihapus.');
    }
}
