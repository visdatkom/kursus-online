<?php

namespace App\Http\Controllers\Member;

use App\Models\Showcase;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShowcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showcases = Showcase::where('user_id', $request->user()->id)->paginate(10);

        return view('member.showcase.index', compact('showcases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $courses = TransactionDetail::with('transaction', 'course.reviews')
                ->whereHas('transaction', function($query) use($user){
                    $query->where('user_id', $user->id)->where('status', 'success');
                })->get();

        return view('member.showcase.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover = $request->file('cover');
        $cover->storeAs('public/showcases', $cover->hashName());

        $request->user()->showcases()->create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $cover->hashName()
        ]);

        return redirect(route('member.showcase.index'))->with('toasts_success', 'Showcase Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Showcase $showcase)
    {
        $user = Auth::user();

        $courses = TransactionDetail::with('transaction', 'course.reviews')
                ->whereHas('transaction', function($query) use($user){
                    $query->where('user_id', $user->id)->where('status', 'success');
                })->get();

        return view('member.showcase.edit', compact('showcase', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase $showcase)
    {
        $request->user()->showcases()->update([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        if($request->file('cover')){
            Storage::disk('local')->delete('public/showcases/'.basename($showcase->cover));

            $cover = $request->file('cover');
            $cover->storeAs('public/showcases/', $cover->hashName());

            $showcase->update([
                'cover' => $cover->hashName(),
            ]);
        }

        return redirect(route('member.showcase.index'))->with('toast_success', 'Showcase Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showcase $showcase)
    {
        Storage::disk('local')->delete('public/showcases/'.basename($showcase->cover));

        $showcase->delete();

        return back()->with('toast_success', 'Showcase Deleted');
    }
}
