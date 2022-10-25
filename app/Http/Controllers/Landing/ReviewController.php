<?php

namespace App\Http\Controllers\Landing;

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
        // tampung seluruh data review kedalam variabel reviews, kemudian data review kita urutan dari yang paling terbaru.
        $reviews = Review::latest()->get();

        // passing variabel $reviews kedama view.
        return view('landing.review.index', compact('reviews'));
    }
}
