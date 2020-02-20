<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

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
    
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
