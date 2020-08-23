<?php

namespace App\Traits;

use App\Like;
use App\User;

trait Likeable
{
    public function scopeWithLikes($query)
    {
        return $query->leftJoinSub(
            'SELECT tweet_id,sum(liked) as likes,sum(!liked) as dislikes FROM likes GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like(User $user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->user()->id,
        ], [
            'liked' => $liked
        ]);
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikedOrDislekedBy(User $user, $liked = true)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', $liked)
            ->count();
    }
}
