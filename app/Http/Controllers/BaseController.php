<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            return redirect()->route('home');
        }
        else{
            return view('auth.login');
        }
    }
}
