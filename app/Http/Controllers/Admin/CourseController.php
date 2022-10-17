<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Course;
use App\Models\Category;
use App\Traits\hasCourse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    use HasCourse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::withCount(['videos', 'details as enrolled' => function($query){
            $query->whereHas('transaction', function($query){
                $query->where('status', 'success');
            });
        }])->paginate(12);

        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.course.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $image->storeAs('public/course', $image->hashName());

        $request->user()->courses()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $request->file('image') ? $image->hashName() : null,
            'price' => $request->price,
            'description' => $request->description,
            'demo' => $request->demo,
            'category_id' => $request->category_id,
            'discount' => $request->discount,
        ]);
        return redirect(route('admin.course.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();

        return view('admin.course.edit', compact('categories', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'description' => $request->description,
            'demo' => $request->demo,
            'category_id' => $request->category_id,
            'discount' => $request->discount,
        ]);

        if($request->file('image')){
            Storage::disk('local')->delete('public/course/'.basename($course->image));

            $image = $request->file('image');
            $image->storeAs('public/course', $image->hashName());

            $course->update([
                'image' => $image->hashName(),
            ]);
        }

        return redirect(route('admin.course.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Storage::disk('local')->delete('public/course/'.basename($course->image));

        $course->delete();

        return back();
    }
}
