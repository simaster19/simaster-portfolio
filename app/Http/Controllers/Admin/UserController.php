<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        return response()->view("App.Admin.User.index");
    }


    public function login()
    {
    }

    public function logout()
    {
    }
}
