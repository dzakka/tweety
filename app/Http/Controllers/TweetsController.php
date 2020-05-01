<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\TweetImage;
use App\User;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('home', [
            'tweets' => auth()->user()->timeline(),
            'friends' => auth()->user()->follows,
        ]);

    }

    public function store()
    {

        $validatedData = request()->validate([
            'tweet' => 'required|max:255',
            'image' => 'file',

        ]);
        if (Tweet::Create([
            'user_id' => auth()->user()->id,
            'tweet' => $validatedData['tweet'],
        ])) {

            $tweet = Tweet::where('tweet', $validatedData['tweet'])->first();
            if (request('image')) {
                $validatedData['image'] = request('image')->store('tweet_images');

                TweetImage::create([
                    'image' => $validatedData['image'],
                    'tweet_id' => $tweet->id,
                ]);
            }
        }

        return back()->with('success', 'Awesome! your tweet was added to your timeline');
    }
    public function destroy(Tweet $tweet)
    {
        $this->authorize('delete', $tweet);
        Tweet::find($tweet)->first()->delete();
        return back()->with('success', 'Your tweet has been deleted succesfully');

    }
}
