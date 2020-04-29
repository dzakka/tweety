<?php

namespace App\Http\Controllers;

use App\Like;
use App\Tweet;
use App\User;

class LikesController extends Controller
{

    public function store(Tweet $tweet)
    {
        if ($tweet->isliked(auth()->user())) {
            $tweet->unlike(auth()->user());
        } else {
            $tweet->like(auth()->user());
        }

        return back();

    }
    public function destroy(Tweet $tweet)
    {
        if ($tweet->disliked(auth()->user())) {
            $tweet->undislike(auth()->user());
        } else {
            $tweet->dislike(auth()->user());

        }

        return back();

    }

}
