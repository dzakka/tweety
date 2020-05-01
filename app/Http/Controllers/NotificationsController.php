<?php

namespace App\Http\Controllers;

class NotificationsController extends Controller
{
    public function index()
    {

        return view('profiles.notifications', [
            "notifications" => tap(auth()->user()->unreadNotifications)->markAsRead(),
        ]);
    }
}
