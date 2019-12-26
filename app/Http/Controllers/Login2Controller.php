<?php

namespace App\Http\Controllers;

use Auth;
use App\user;
use Illuminate\Http\Request;




/// Classe Login2Controller
///
/// Classe permet la connexion d'un utilisateur et sa redirection vers la page adéquate selon sa profession.
class Login2Controller extends Controller
{
    /// Fonction login
    ///
    /**  Permet de vérifie les informations que l'utilisateur a saisi et de le rediriger vers la page adéquate,
     **  'liste' pour l'enseignant et 'inscrire' pour l'employé d'administrartion, 'home' sinon.
     */
    /// @param Request $request: pour récupérer les informations que l'utilisateur a saisi dans le formulaire
    /// @returns  la page vers laquelle l'utilisateur est redirigé 

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
            
            else return redirect()->route('/home');
        }
        return redirect()->back();

    }
}
