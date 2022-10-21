<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationDatabaseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function readNotification($id)
    {
        Auth::user()->notifications->where('id', $id)->markAsRead();

        return back();
    }

    public function readAllNotification()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return back();
    }
}
