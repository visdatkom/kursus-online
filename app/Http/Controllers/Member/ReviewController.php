<?php

namespace App\Http\Controllers\Member;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $course->reviews()->UpdateOrcreate([
            'user_id' => $request->user()->id,
        ],[
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return back()->with('toast_success', 'Review Created');
    }
}
