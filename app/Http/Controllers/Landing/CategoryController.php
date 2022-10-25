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
        // tampung data course kedalam variabel $courses, yang dimana "category_id"nya sama dengan variabel $category, kemudian data course kita urutan dari yang paling terbaru.
        $courses = Course::where('category_id', $category->id)
            ->latest()
            ->get();

        // passing variabel $course dan $category kedalam view.
        return view('landing.category.show', compact('courses', 'category'));
    }
}
