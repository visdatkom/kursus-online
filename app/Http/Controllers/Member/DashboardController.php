<?php

namespace App\Http\Controllers\Member;

use App\Models\Review;
use App\Models\Category;
use App\Models\Showcase;
use App\Traits\HasCourse;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    use HasCourse;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        $course = TransactionDetail::with('transaction', 'course.reviews')
                ->whereHas('transaction', function($query) use($user){
                    $query->where('user_id', $user->id)->where('status', 'success');
                })->count();

        $review = Review::where('user_id', $user->id)->count();

        $transaction = Transaction::where('user_id', $user->id)
            ->where('status', 'success')->count();

        $showcase = Showcase::where('user_id', $user->id)->count();

        return view('member.dashboard', compact('course', 'review', 'transaction', 'showcase'));
    }
}
