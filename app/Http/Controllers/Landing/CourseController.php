<?php

namespace App\Http\Controllers\Landing;

use App\Models\Video;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        $videos = Video::whereBelongsTo($course)->get();

        return view('landing.course.show', compact('course', 'videos'));
    }

    public function video(Course $course, $episode)
    {
        $video = Video::whereBelongsTo($course)->where('episode', $episode)->first();

        return view('landing.course.video', compact('course','video'));
    }
}
