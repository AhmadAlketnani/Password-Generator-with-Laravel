<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // function to show login page (form)
    public function index()
    {
        return view('auth.login');
    }// end of index

    //login logic
    public function authenticate(Request $request)
    {
       $user= $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($user))
        {
            $request->session()->regenerate();
            return redirect(route('password.index'));
        }
        else
        {

            return  redirect()->back()->withErrors('email or password is wrong or user does not exist');
        }

    }// end of authenticate function
}
