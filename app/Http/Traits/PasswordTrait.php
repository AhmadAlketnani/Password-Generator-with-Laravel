<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait PasswordTrait
{
    public function genrate()
    {
        $ALPHA = "ABCDEFGHIJKLMNOPKRSTUVWXYZ";
        $ALPHA_SMALL = Str::lower($ALPHA);
        $NUMBERS = "12345677890";
        $SPACHAL = "@#$%_.-*";
        $FINAL_VAR = $SPACHAL.$ALPHA.$SPACHAL.$NUMBERS.$ALPHA_SMALL.$SPACHAL;
        $password ="";
        $length= rand(12,24);


       for ($i=0; $i < $length ; $i++) {
        $password .= substr($FINAL_VAR,rand(0, strlen($FINAL_VAR)-1),1);
       }

    //    return redirect()->route("$request->pageName" , compact('password'));
    return $password;
    }

}

