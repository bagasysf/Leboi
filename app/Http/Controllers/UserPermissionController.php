<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionController extends Controller
{
    public function index()
    {
        $title = 'User Permission Page';
        $header = 'User Permission';
        $userPermissions = Permission::all();
        return view('user-permissions.index', [
            'title' => $title,
            'header' => $header,
            'userPermissions' => $userPermissions,
        ]);
    }
}
