<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::withCount('videos')->get();

        $articles = Article::with(['category', 'tags', 'user'])->get();

        return view('landing.home', compact('courses', 'articles'));
    }
}
