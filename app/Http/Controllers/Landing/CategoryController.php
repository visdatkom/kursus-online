<?php

namespace App\Http\Controllers\Landing;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        $courses = Course::where('category_id', $category->id)
            ->latest()
            ->get();

        return view('landing.category.show', compact('courses', 'category'));
    }
}
