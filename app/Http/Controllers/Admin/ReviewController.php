<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $reviews = Review::search('rating')
            ->multiSearch('course', 'name')
            ->multiSearch('user', 'name')
            ->paginate(2)
            ->withQueryString();

        return view('admin.review.index', compact('reviews'));
    }
}
