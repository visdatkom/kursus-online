<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Traits\HasCourse;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HasCourse;

    public function __invoke()
    {
        $courses = Course::withCount(['videos', 'details as enrolled' => function($query){
            $query->whereHas('transaction', function($query){
                $query->where('status', 'success');
            });
        }])->get();

        return view('landing.home', compact('courses'));
    }
}
