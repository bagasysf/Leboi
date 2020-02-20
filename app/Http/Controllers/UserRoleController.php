<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserRoleController extends Controller
{
    public function index()
    {
        $title = 'User Role Page';
        $header = 'User Roles';
        $userRoles = Role::all();
        return view('user-roles.index', [
            'title' => $title,
            'header' => $header,
            'userRoles' => $userRoles,
        ]);
    }
}
