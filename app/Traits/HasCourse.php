<?php

namespace App\Traits;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

trait hasCourse
{
    public function userCourse($course)
    {
        $user = Auth::user();

        $transaction = Transaction::with('user', 'details.course')
            ->where('user_id', $user->id)
            ->where('status', 'success')
            ->whereHas('details', function($query) use($course){
                $query->where('course_id', $course->id);
            });

        return $transaction;
    }

    public function enrolled($course)
    {
        $enrolled = Transaction::with('details.course')
            ->where('status', 'success')
            ->whereHas('details', function($query) use($course){
                $query->where('course_id', $course->id);
            });

        return $enrolled;
    }
}
