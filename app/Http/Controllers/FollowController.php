<?php

namespace App\Http\Controllers;

use App\User;

class FollowController extends Controller
{
    public function store(User $user)
    {
        if ($user->id !== auth()->user()->id) {
            toast("@$user->username followed!", 'info');

            auth()
                ->user()
                ->toggleFollow($user);
        }

        return redirect()->back();
    }
}
