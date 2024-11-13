<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    function signin(){
        return view('backend.pages.auth.signin');
    }

    function signup(){
        return view('backend.pages.auth.signup');
    }

    function passReset(){
        return view('backend.pages.auth.password-reset');
    }
}
