<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use Carbon\Carbon;


class TweetsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        return view('home',[
            'tweets'=> auth()->user()->timeline(),
            'friends'=> auth()->user()->follows,
        ]);

    }

    public function store(){

        $validatedData = request()->validate([
            'tweet'=>'required|max:255'
        ]);
       Tweet::Create([
           'user_id'=> auth()->user()->id,
            'tweet'=> $validatedData['tweet']
       ]);

       return back()->with('success','Awesome! your tweet was added to your timeline');
    }

}
