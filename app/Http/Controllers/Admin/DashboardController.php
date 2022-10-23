<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Review;
use App\Models\Category;
use App\Models\Showcase;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $author = User::role('author')->count();

        $showcase = Showcase::count();

        $review = Review::count();

        $member = User::count();

        $bestCourse = DB::table('transaction_details')
                            ->addSelect(DB::raw('courses.name as name, count(transaction_details.course_id) as total'))
                            ->join('courses', 'courses.id', 'transaction_details.course_id')
                            ->groupBy('transaction_details.course_id')
                            ->orderBy('total', 'DESC')
                            ->limit(5)
                            ->get();

            $label = [];

            $total = [];

            if(count($bestCourse)){
                foreach($bestCourse as $data){
                    $label[] = $data->name;
                    $total[] = (int) $data->total;
                }
            }else{
                $label[] = '';
                $total[] = '';
            }


        return view('admin.dashboard', compact('category', 'course', 'transaction', 'revenue', 'author', 'showcase', 'review', 'member', 'label', 'total'));
    }
}
