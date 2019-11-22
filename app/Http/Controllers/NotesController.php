<?php

namespace App\Http\Controllers;

use App\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function store()
    {
        Notes::create([
            'nom'=> request('nom'),
            'prenom'=> request('prenom'),
            'noteTd'=>request('noteTd'),
            'note1'=>request('note1'),
            'note2'=>request('note2'),
        ]);

        return("notes insérée");

    }
}
