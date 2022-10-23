<?php

namespace App\Traits;

use App\Models\Transaction;
use App\Models\TransactionDetail;
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

    public function revenue()
    {
        $user = Auth::user();

        return TransactionDetail::with('transaction', 'course')
                ->whereHas('course', function($query) use($user){
                    $query->where('user_id', $user->id);
                })->whereHas('transaction', function($query){
                    $query->Where('status', 'success');
                });
    }
}
