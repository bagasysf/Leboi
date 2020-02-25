<?php

namespace App\Http\Controllers;

use App\Package;
use App\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        $title = 'User Page';
        $header = 'Users';
//        $users = User::all();
        $user = User::query();
        $columns = ['name', 'email', 'created_at', 'updated_at'];
        foreach ($columns as $column) {
            $user->orWhere($column, 'like', '%' . $cari . '%');
        }
        $users = $user->paginate(8);
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
