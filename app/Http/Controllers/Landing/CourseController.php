<?php

namespace App\Http\Controllers\Landing;

use App\Models\Video;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\HasCourse;

class CourseController extends Controller
{
    use HasCourse;

    public function show(Course $course)
    {
        $videos = Video::whereBelongsTo($course)->get();

        $enrolled = $this->enrolled($course)->count();

        return view('landing.course.show', compact('course', 'videos', 'enrolled'));
    }

    public function video(Course $course, $episode)
    {
        $video = Video::whereBelongsTo($course)->where('episode', $episode)->first();

        $transaction = $this->userCourse($course)->get();

        if($transaction->count() > 0){
            $alreadyBought = $this->userCourse($course)->get();
        }else{
            $alreadyBought = 0;
        }

        if($alreadyBought || $video->intro == 0){
            $videos = Video::whereBelongsTo($course)->orderBy('episode')->get();
        }else{
            return back()->with('toast_error', 'Episode ini hanya untuk member premium');
        }

        return view('landing.course.video', compact('course','video', 'videos', 'alreadyBought'));
    }
}
