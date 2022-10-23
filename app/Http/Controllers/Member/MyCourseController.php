<?php

namespace App\Http\Controllers\Member;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

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

        $courses = TransactionDetail::with('transaction', 'course.reviews')
                ->whereHas('transaction', function($query) use($user){
                    $query->where('user_id', $user->id)->where('status', 'success');
                })->whereHas('course', function($query){
                    $query->where('name', 'like', '%'. request()->search .'%');
                })->paginate(3);

        return view('member.course.mycourse', compact('courses'));
    }
}
