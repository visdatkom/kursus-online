<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function create($slug)
    {
        $course = Course::where('slug', $slug)->first();

        return view('admin.video.create', compact('course'));
    }

    public function store($slug, Request $request)
    {
        $course = Course::where('slug', $slug)->first();

        $course->videos()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'episode' => $request->episode,
            'intro' => $request->intro,
            'video_code' => $request->video_code,
            'duration' => $request->duration,
        ]);

        return redirect(route('admin.course.index'));
    }
}
