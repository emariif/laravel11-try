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
        return view('pages.users.create');
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
}
