<?php

namespace App\Http\Controllers;

use App\Eleves;
use Illuminate\Http\Request;

/// Classe EtudiantController
///
/// Classe qui regroupe les fonctions nécessaires à la gestion des étudiants.
class EtudiantController extends Controller
{
    /// Fonction store
    ///
    /**Permet l'ajout d'un étudiant en base de données et donc son inscription, elle récupère les informations 
    **saisie à partir d'un formulaire, fait une validation des informations puis les insère dans la BDD.*/
    ///@returns json: retourne une réponse en format json de l'étudiant inscrit    
    
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
            'section'=>['required'],
            'groupe'=>['required','integer'],
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
            'section'=>request('section'),
            'groupe'=>request('groupe'),
        ]);

        return(response()->json($eleve,200));
    }

    /// Fonction index
    /// Permet de retourner la vue 'liste' si l'utilisateur accède à l'URL 'liste' plus de détails dans le fichier web.php.
    /// @return view: retourne la vue 'liste'
    public function index()
    {
        return view('liste'); //retourne la vue où seront lister les étudiants
    }

    /// Fonction get
    /// Permet d'afficher la liste des étudiants d'un certain niveau après une lecture en BDD.
    /// @param Request $request: qui permet de savoir quel est le niveau des étudiants à lister
    /// @returns json: retourne une réponse en format json des étudiants séléctionnés

    public function get(Request $request) 
    {
        $etudiant=Eleves::where('niveau',$request->niveau)->get();
        return response()->json($etudiant);     
    }

}
