<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = DB::select("SELECT users.id,users.first_name,users.last_name,users.email,
        COUNT(is_read) AS unread FROM users LEFT JOIN messages ON users.id =
        messages.from AND messages.is_read = 0 WHERE users.id = ".Auth::id()." GROUP BY users.id,
        users.first_name,users.last_name,users.email");
        // dd($notification);

        return view('home',compact('notifications'));
    }

    public function adminHome()
    {
        return view('adminHome');
    }
}

