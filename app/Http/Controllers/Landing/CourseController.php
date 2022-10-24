<?php

namespace App\Http\Controllers\Landing;

use App\Models\Video;
use App\Models\Course;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::search('name')->latest()->get();

        return view('landing.course.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $videos = Video::whereBelongsTo($course)->get();

        $enrolled = Transaction::with('details.course')
            ->where('status', 'success')
            ->whereHas('details', function($query) use($course){
                $query->where('course_id', $course->id);
            })->count();

        $alreadyBought = Transaction::with('details.course')
            ->where('status', 'success')
            ->where('user_id', Auth::id())
            ->whereHas('details', function($query) use($course){
                $query->where('course_id', $course->id);
            })->first();

        return view('landing.course.show', compact('course', 'videos', 'enrolled', 'alreadyBought'));
    }

    public function video(Course $course, $episode)
    {
        $user = Auth::user();

        $video = Video::whereBelongsTo($course)->where('episode', $episode)->first();

        $transaction = Transaction::with('user', 'details.course')
            ->where('user_id', $user->id)
            ->where('status', 'success')
            ->whereHas('details', function($query) use($course){
                $query->where('course_id', $course->id);
            })->get();

        $reviews = Review::where('course_id', $course->id)->get();

        $avgRating = Review::where('course_id', $course->id)->avg('rating');

        if($transaction->count() > 0){
            $alreadyBought = $transaction;
        }else{
            $alreadyBought = 0;
        }

        if($alreadyBought || $video->intro == 0){
            $videos = Video::whereBelongsTo($course)->orderBy('episode')->get();
        }else{
            return back()->with('toast_error', 'Episode ini hanya untuk member premium');
        }

        return view('landing.course.video', compact('course','video', 'videos', 'alreadyBought', 'reviews', 'avgRating'));
    }
}
