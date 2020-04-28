<?php

namespace App\Http\Controllers;

use App\Like;
use App\Tweet;
use App\User;

class LikesController extends Controller
{

    public function store(Tweet $tweet)
    {
        $tweet->like(auth()->user());
        return back();

    }
    public function destroy(Tweet $tweet)
    {

        $tweet->dislike(auth()->user());
        return back();

    }

}
