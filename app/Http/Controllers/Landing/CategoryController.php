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
        /*
            tampung semua data course kedalam variabel $courses, kemudian kita memanggil relasi menggunakan withcount,
            selanjutnya pada saat melakukan pemanggilan relasi details yang kita ubah namanya menjadi enrolled, disini kita melakukan sebuah query untuk mengambil data transaksi yang memiliki status "success", disini kita juga menambahkan method search yang kita dapatkan dari sebuah trait hasScope, dan juga kita urutkan datanya dari yang paling baru.
        */
        $courses = Course::withCount(['videos', 'reviews', 'details as enrolled' => function($query){
            $query->whereHas('transaction', function($query){
                $query->where('status', 'success');
            });
        }])->where('category_id', $category->id)->search('name')->latest()->get();

        // passing variabel $course dan $category kedalam view.
        return view('landing.category.show', compact('courses', 'category'));
    }
}
