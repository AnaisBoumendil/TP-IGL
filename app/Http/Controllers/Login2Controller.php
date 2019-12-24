<?php

namespace App\Http\Controllers;

use Auth;
use App\user;
use Illuminate\Http\Request;

class Login2Controller extends Controller
{
    public function login(Request $request){
        
        if (Auth::attempt([
            'email'=>$request->email,
            'password'=> $request->password,
        ]))
        {
            $user= User::where('email',$request->email)->first(); //recherche du user dans la bdd
            if ($user->isTeacher()){
                return redirect()->route('liste');
            }
            elseif ($user->isAdminWorker()){
                return redirect()->route('inscrire');
            }
            return redirect()->route('/home');
        }

    }
}
