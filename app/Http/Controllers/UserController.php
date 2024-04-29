<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::latest()->get();

        return view('pages.users.index', [
            'users' => $users
        ]);
    }

    public function create() {
        return view('pages.users.form', [
            'user'  => new User(),
            'page_meta' => [
                'title' => 'Create new user',
                'method'=> 'post',
                'url'   => '/users',
                'submit_text' => 'Create'
            ]
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name'  => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'password'  => ['required', 'min:8']
        ]);

        User::create($validated);

        return redirect('/users');
    }

    public function show(User $user) {
        return view('pages.users.show', [
            'user'  => $user,
        ]);
    }

    public function edit(User $user) {
        return view('pages.users.form', [
            'user'  => $user,
            'page_meta' => [
                'title' => 'Edit user: ' . $user->name,
                'method'=> 'put',
                'url'   => '/users/' . $user->id,
                'submit_text' => 'Update'
            ]
        ]);
    }

    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name'  => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'password'  => ['required', 'min:8']
        ]);

        $user->update($validated);

        return redirect('/users');
    }
}
