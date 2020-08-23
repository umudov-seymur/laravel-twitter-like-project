<?php

namespace App;

use App\Traits\Followable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->get();
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = !is_null($value) ? bcrypt($value) : $this->password;
    }

    public function getAvatarPathAttribute()
    {
        return !is_null($this->avatar)
            ? Storage::url($this->avatar)
            : asset('default-avatar.jpeg');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
