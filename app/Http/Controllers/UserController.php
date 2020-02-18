<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = 'User Page';
        $header = 'Users';
        $users = User::all();
        return view('users.index', [
            'title' => $title,
            'header' => $header,
            'users' => $users,
        ]);
    }
}
