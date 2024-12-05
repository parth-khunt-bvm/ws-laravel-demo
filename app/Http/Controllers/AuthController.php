<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use App\Models\User;
use App\Services\Auth\RegiserServices;
use App\Http\Requests\Auth\SignupRequest;
use Exception;

class AuthController extends Controller
{
    protected $regiserServices;

    public function __construct(RegiserServices $RegiserServices)
    {
        $this->regiserServices = $RegiserServices;
    }

    function signin(){

        return view('backend.pages.auth.signin');
    }
    function signInCheck(Request $request){

        if (Auth::guard('admin')->attempt(['email' => $request->input('username'), 'password' => $request->input('password'), 'deleted_at'=> null]) ) {

            return redirect()
                    ->route('dashboard')
                    ->with('success', 'You have successfully logged in.');
        } else {
            return redirect()
                ->back()
                ->with('danger', 'Invalid Login Id/Password');
        }
    }

    function signup(){
        return view('backend.pages.auth.signup');
    }

    public function createAccount(SignupRequest $request)
    {
        try {
            $response = $request->addUser();
            if ($response['status'] === 'success') {
                return redirect()
                    ->route('sign-in')
                    ->with('success', $response['message']);
            }

            // Handle potential failure from `addUser`
            return redirect()
                ->back()
                ->with('danger', $response['message']);

        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('danger', 'An error occurred: ' . $e->getMessage());
        }
    }


    function passReset(){
        return view('backend.pages.auth.password-reset');
    }
}
