<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index($slug)
    {
        $course = Course::where('slug', $slug)->first();

        $videos = Video::where('course_id', $course->id)->get();

        return view('admin.video.index', compact('videos', 'course'));
    }
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

    public function edit($slug, Video $video)
    {
        $course = Course::where('slug', $slug)->first();

        return view('admin.video.edit', compact('course','video'));
    }

    public function update(Request $request, $slug, Video $video)
    {
        $course = Course::where('slug', $slug)->first();

        $video->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'episode' => $request->episode,
            'intro' => $request->intro,
            'video_code' => $request->video_code,
            'duration' => $request->duration,
        ]);

        return redirect(route('admin.video.index', $course));
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return back();
    }
}
