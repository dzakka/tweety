<?php

namespace App;

use App\Tweet;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets()
    {

        return $this->hasMany(Tweet::class, 'user_id');
    }

    public function getpictureAttribute()
    {

        return "https://i.pravatar.cc/40?u=" . $this->email;
    }

    public function timeline()
    {
        $friendsids = $this->follows->pluck('id');
        return Tweet::whereIn('user_id', $friendsids)
            ->orWhere('user_id', $this->id)->latest()->get();

    }

}
