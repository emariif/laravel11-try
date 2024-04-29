<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
                'url'   => route('users.store'),
                'submit_text' => 'Create'
            ]
        ]);
    }

    public function store(UserRequest $request) {
        User::create($request->validated());

        return to_route('users.index');
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
                'url'   => route('users.update', $user->id),
                'submit_text' => 'Update'
            ]
        ]);
    }

    public function update(UserRequest $request, User $user) {
        $user->update($request->validated());

        return to_route('users.index');
    }

    public function destroy(User $user) {
        $user->delete();

        return to_route('users.index');
    }
}
