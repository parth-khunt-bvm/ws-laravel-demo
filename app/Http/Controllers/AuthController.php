<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\Models\User;
class AuthController extends Controller
{

    function signin(){
        return view('backend.pages.auth.signin');
    }
    function signInCheck(Request $request){
        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'is_deleted'=>'N', 'status'=>'A']) ) {
            $loginData = array(
                'first_name' => Auth::guard('admin')->user()->first_name,
                'last_name' => Auth::guard('admin')->user()->last_name,
                'email' => Auth::guard('admin')->user()->email,
                'userimage' => Auth::guard('admin')->user()->userimage,
                'usertype' => Auth::guard('admin')->user()->user_type,
                'id' => Auth::guard('admin')->user()->id
            );
            Session::push('logindata', $loginData);

            setcookie("branch", "", time() - 3600, "/");
            setcookie("branch", "all", time() + (86400 * 30), "/"); // 86400 = 1 day
            $return['status'] = 'success';
            $return['message'] = 'You have successfully logged in.';
            $return['redirect'] = route('my-dashboard');
        } else {
            $return['status'] = 'error';
            $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
            $return['message'] = 'Invalid Login Id/Password';
        }
        return json_encode($return);
        exit();
    }

    function signup(){
        return view('backend.pages.auth.signup');
    }

    function createAccount(Request $request){
         // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'user_name' => 'required|string|max:191|unique:users,user_name',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Insert data into the users table
        $user = User::create([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    function passReset(){
        return view('backend.pages.auth.password-reset');
    }
}
