<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return response()->view("App.Admin.Dashboard.dashboard");
    }

    public function getMessage()
    {
        $message = Message::all();

        return response()->json($message, 200);
    }
}
