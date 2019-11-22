<?php

namespace App\Http\Controllers;

use App\Notes;
use Illuminate\Http\Request;


class NotesController extends Controller
{
    public function store()
    {
        request()->validate([
            'nom'=>['required', 'string', 'max:255'],
            'prenom'=>['required', 'string', 'max:255'],
            'noteTd'=>['required', 'max:20','min:0'],
            'note1'=>['required',  'max:20','min:0'],
            'note2'=>['required',  'max:20','min:0'],
        ]);
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
