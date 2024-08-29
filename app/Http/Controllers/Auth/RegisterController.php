<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }// end of index

    //login logic
    public function store(Request $request)
    {
        $user = new User();

        $request->validate([
            'name' =>'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // // Hash::check($value, $hashedValue)
        // $arr=[
        //     'hash1' => Hash::make('12345'),
        //     'hash2' => Hash::make('12345'),
        //     'hash3' => Hash::make('12345'),
        // ];
        // dd($arr);



        $user->save();

        $request->session()->regenerate();
        return redirect('login');
        // // return back()->with('success', 'Register successfully');
        // return redirect('/login');


        // if (Auth::attempt($user))
        // {
        // }
        // else
        // {
        //     return  redirect()->back();
        // }
        // return  redirect()->back();
    }// end of authenticate function
}
