<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function showUsers()
    {
        return view('users', [
            'users' => User::getRecentlyUsers()
        ]);
    }
}
