<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Review;
use App\Models\Category;
use App\Models\Showcase;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $category = Category::count();

        $course = Course::count();

        $transaction = Transaction::where('status', 'success')->count();

        $revenue = Transaction::where('status', 'success')->sum('grand_total');

        $revenueToday = Transaction::where('status', 'success')->whereDate('created_at', today())->sum('grand_total');

        $showcase = Showcase::count();

        $review = Review::count();

        $member = User::count();

        return view('admin.dashboard', compact('category', 'course', 'transaction', 'revenue', 'revenueToday', 'showcase', 'review', 'member'));
    }
}
