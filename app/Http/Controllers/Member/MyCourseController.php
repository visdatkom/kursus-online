<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;

class MyCourseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        // $courses = Course::withCount(['videos', 'details as enrolled' => function($query) use($user){
        //     $query->where('user_id', $user->id)->whereHas('transaction', function($query){
        //         $query->where('status', 'success');
        //     });
        // }])->paginate(12);

        $courses = TransactionDetail::with('transaction', 'course')
                ->whereHas('transaction', function($query) use($user){
                    $query->where('user_id', $user->id)->where('status', 'success');
                })->paginate(3);

        // dd($courses);

        return view('member.course.mycourse', compact('courses'));
    }
}
