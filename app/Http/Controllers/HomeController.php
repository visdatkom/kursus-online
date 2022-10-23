<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Traits\HasCourse;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HasCourse;

    public function __invoke()
    {
        $courses = Course::withCount(['videos', 'reviews', 'details as enrolled' => function($query){
            $query->whereHas('transaction', function($query){
                $query->where('status', 'success');
            });
        }])->limit(6)->latest()->get();

        $user = User::role('member')->get();

        return view('landing.home', compact('courses', 'user'));
    }
}
