<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $tweets = $user->tweets()->withLikes()->paginate(3);
        return view('profiles.show', compact('user', 'tweets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // abort_if($user->isNot(current_user()), 404);
        // $this->authorize('edit', $user);
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $ignoreValidation = Rule::unique('users')->ignore($user->id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'biography' => ['required', 'string'],
            'avatar' => ['image'],
            'username' => ['required', 'string', 'max:255', $ignoreValidation],
            'password' => 'confirmed',
            'email' => ['required', 'string', 'email', 'max:255', $ignoreValidation],
        ]);

        if ($request->has('avatar')) {
            Storage::delete($user->avatar);
            $validatedData['avatar'] = Storage::put('avatars/', $request->file('avatar'));
        }

        $user->update($validatedData);

        // Alert::success('Thank you!', 'Profile updated successfull!');
        toast('Profile updated successfull!', 'success');

        return redirect()->route('profile', $request->username);
    }
}
