<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Likable;

    protected $fillable = ['user_id', 'tweet'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tweetImages()
    {
        return $this->hasMany(TweetImage::class);
    }

}
