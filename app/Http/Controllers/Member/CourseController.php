<?php

namespace App\Http\Controllers\Member;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tampung data user yang sedang login kedalam variabel $user.
        $user = Auth::user();

        /*
            tampung semua data course kedalam variabel $courses, kemudian kita memanggil relasi menggunakan withcount,
            selanjutnya pada saat melakukan pemanggilan relasi details yang kita ubah namanya menjadi enrolled, disini kita melakukan sebuah query untuk mengambil data transaksi yang memiliki status success, selanjutnya kita pecah data course yang kita tampilkan hanya 12 per halaman dengan urutan terbaru dan juga kita hanya menampilkan data course yang dimiliki oleh user yang sedang login.
        */
        $courses = Course::withCount(['videos as video', 'details as enrolled' => function($query){
            $query->whereHas('transaction', function($query){
                $query->where('status', 'success');
            });
        }])->where('user_id', $user->id)->latest()->paginate(12);

        // passing variabel $courses kedalam view.
        return view('member.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('member.course.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $image = $request->file('image');
        $image->storeAs('public/course', $image->hashName());

        $request->user()->courses()->create([
            'name' => $request->name,
            'image' => $request->file('image') ? $image->hashName() : null,
            'price' => $request->price,
            'description' => $request->description,
            'demo' => $request->demo,
            'category_id' => $request->category_id,
            'discount' => $request->discount,
        ]);
        return redirect(route('member.course.index'))->with('toast_success', 'Course Created');
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

        return view('member.course.edit', compact('categories', 'course'));
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

        return redirect(route('member.course.index'))->with('toast_success', 'Course Updated');
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

        return back()->with('toast_success', 'Course Deleted');
    }
}
