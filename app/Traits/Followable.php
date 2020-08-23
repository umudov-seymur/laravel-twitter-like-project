<?php

namespace App\Traits;

use App\User;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function toggleFollow(User $user)
    {
        return $this->follows()->toggle($user);
    }

    public function following(User $user)
    {
        return $this->follows->contains($user);
    }
}
