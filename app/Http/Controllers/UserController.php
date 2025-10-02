<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == "user") {

            return view('user_dashboard');
        } else if (Auth::user()->role == "admin") {
            return view('admin.admin_dashboard');
        }
    }
}
