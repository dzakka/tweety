<?php

namespace App\Http\Controllers;

use App\Follow;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function index()
    {
        return view('tweets.explore', [
            'users' => User::limit(7)->get(),
        ]);
    }

    public function show(User $user)
    {

        return view('profiles.show', compact('user'));
    }

    public function toggle(User $user)
    {

        if (auth()->user()->following($user)) {
            auth()->user()->unfollow($user);
            return back()->with('success', 'Tada!, your unfollowing now');
        } else {
            auth()->user()->follow($user);
            return back()->with('success', 'Tada!, your follwing now');
        }
    }
    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {

        $this->authorize('update', $user);
        $validatedData = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_num', Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if (request('avatar')) {
            $validatedData['avatar'] = request('avatar')->store('avatar');

        }
        $validatedData['password'] = Hash::make(request('password'));
        $user->update($validatedData);
        return redirect('/profiles')->with('success', 'saved succss');

    }

}
