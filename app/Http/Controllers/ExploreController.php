<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{

        public function index(){
            return view('tweets.explore',[
                'users'=>User::limit(7)->get(),
            ]);
        }

}
