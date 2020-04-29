<?php

namespace App;

use App\Follow;
use App\Notifications\Following;

trait Followable
{

    public function follows()
    {

        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow(User $user)
    {
        /*My way of writing to follow the new user
        Follow::create([
        'user_id'=>$this->id,
        'following_user_id'=>$user->id,
        ])->save();
        return true;
         */
        //Notification::send($user, new Following());
        if ($this->follows()->save($user)) {
            $user->notify(new Following(auth()->user(), $user));
        }
        return;
    }

    public function following(User $user)
    {
        // $following =  Follow::where('user_id', auth()->user()->id)
        //               ->where('following_user_id' , $user->id)
        //               ->first();
        // if(empty($following)){
        //     return 0;
        // }else{
        //     return 1;
        // }
        return $this->follows()->where('following_user_id', $user->id)->exists();

    }

    public function unfollow(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->detach($user);
    }

}
