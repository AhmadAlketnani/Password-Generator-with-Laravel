<?php

namespace App\Http\Controllers\Password;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\PasswordTrait;
use App\Http\Controllers\Controller;

class PasswordGenratorController extends Controller
{
    use PasswordTrait;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
    //     $ALPHA = "ABCDEFGHIJKLMNOPKRSTUVWXYZ";
    //     $ALPHA_SMALL = Str::lower($ALPHA);
    //     $NUMBERS = "12345677890";
    //     $SPACHAL = "@#$%_.-*&";
    //     $FINAL_VAR = $SPACHAL.$ALPHA.$SPACHAL.$NUMBERS.$ALPHA_SMALL.$SPACHAL;
    //     $password ="";
    //     $length= rand(8,24);


    //    for ($i=0; $i < $length ; $i++) {
    //     $password .= substr($FINAL_VAR,rand(0, strlen($FINAL_VAR)-1),1);
    //    }

    // //    return redirect()->route("$request->pageName" , compact('password'));
    // return $password;

    $password = $this->genrate();

    return view('password.generate', compact('password'));
    }
}
