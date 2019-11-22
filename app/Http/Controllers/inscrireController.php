<?php

namespace App\Http\Controllers;

use App\Eleves;
use Illuminate\Http\Request;


class inscrireController extends Controller
{
    public function store()
    {
        request()->validate([
            'nom'=>['required', 'string', 'max:255'],
            'prenom'=>['required', 'string', 'max:255'],
            'dateNaiss'=>['required'],
            'lieuNaiss'=>['required', 'string', 'max:255'],
            'adr'=>['required', 'string', 'max:255'],
            'mail'=>['required','string', 'email', 'max:255'],
            'numIns'=>['required', 'string', 'max:255'],
            'niveau'=>['required', 'string', 'max:255'],
        ]);
        $eleve=Eleves::create([
            'nom'=> request('nom'),
            'prenom'=> request('prenom'),
            'dateNaiss'=> request('dateNaiss'),
            'lieuNaiss'=> request('lieuNaiss'),
            'adr'=> request('adr'),
            'mail'=> request('mail'),
            'numIns'=> request('numIns'),
            'niveau'=> request('niveau'),
        ]);

        return(response()->json($eleve,200));
    }

}
