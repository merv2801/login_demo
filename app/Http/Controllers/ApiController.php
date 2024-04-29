<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Login View
    public function login(){
        return view('login');
    }

    // Dashboard View
    public function dashboardget(){
        return view('dashboard');
    }


    // Logout View
    public function logout(){
        Auth::logout();
 
        return redirect()->route('login');
    }

}
