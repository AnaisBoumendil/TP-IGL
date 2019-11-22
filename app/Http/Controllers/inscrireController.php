<?php

namespace App\Http\Controllers;

use App\Eleves;
use Illuminate\Http\Request;


class inscrireController extends Controller
{
    public function store()
    {
        Eleves::create([
            'nom'=> request('nom'),
            'prenom'=> request('prenom'),
            'dateNaiss'=> request('dateNaiss'),
            'lieuNaiss'=> request('lieuNaiss'),
            'adr'=> request('adr'),
            'mail'=> request('mail'),
            'numIns'=> request('numIns'),
            'niveau'=> request('niveau'),
        ]);

        return("Etudiant ajouté");
    }

}
