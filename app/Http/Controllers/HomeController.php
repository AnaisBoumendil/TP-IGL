<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * le constructeur qui permet de rendre la page 'home' accessible au utilisateur connectés seulement.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     
     ** @return view: retourne la 'vue home'
     */
    public function index()
    {
        return view('home');
    }
}
