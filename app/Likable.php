<?php

namespace App;

trait Likable
{

    public function likes()
    { //getting all the rows from DB in Like table where there is current tweet id
        return $this->hasMany(Like::class);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        //checking the likes collection if the tweet id exists, if it exists it will udpate or else create a new one

        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]
        );
    }

    public function isliked(User $user)
    {
        return (bool) $user->likes->where('user_id', $this->id)->where('liked', true)->count();

    }

    public function disliked(User $user)
    {
        return (bool) $user->likes->where('user_id', $this->id)->where('liked', false)->count();
    }

    /*public function scopeWithLikes(Builder $query)
    jweffery's code
    {
    $query->leftJoinSub(
    'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
    'likes',
    'likes.tweet_id',
    'tweets.id'
    );
    }
     */
    public function alllikes()
    {
        return $this->hasMany(Like::class)->where('liked', true)->count();
    }

    public function dislikes()
    {
        return $this->hasMany(Like::class)->where('liked', false)->count();
    }

}
