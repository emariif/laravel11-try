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
}
