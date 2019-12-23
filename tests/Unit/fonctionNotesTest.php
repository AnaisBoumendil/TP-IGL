<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Notes;
use App\User;

class fonctionNotesTest extends TestCase
{
    use RefreshDatabase;

    // Test qui vérifie la redirection vers le login si l'utilisateur n'est pas connecté
    /** @test */
    public function notesRedirigerVersLoginSiNonConnecter()
    {
        $response=$this->get("notes");
        $response->assertRedirect('login');
    }

     // Test qui vérifie la redirection vers la page de saisie de notes si l'utilisateur enseignant est connecté
    /** @test */
    public function allerVersNotesSiConnecter(){
        $this->actingAs(factory(User::class)->create([
            'name' =>'nom',
            'firstName' => 'nom',
            'profession' => 'enseignant',
        ])); //on a généré un utilisateur enseignant
       $response=$this->get('notes')->assertOk(); //asserOk:si le code de retour est 200
    }


    // Test qui vérifie si la note est insérée dans la base de données 
    /** @test */
    public function verifierInsertionNoteDansBdd(){
        $this->actingAs(factory(User::class)->create([
            'name' =>'nom',
            'firstName' => 'nom',
            'profession' => 'enseignant',
        ])); //on a généré un utilisateur enseignant
        $response=$this->post('notes',[
            'nom' =>'nomEleve',
            'prenom'=>'prenomEleve',
            'noteTd'=> 14,
            'note1' => 15,
            'note2' => 16,
        ]); //on remplit les champs de la table Notes de la bdd
        $this->assertCount(1,Notes::all()); 
        /*le nombre d'élément dans notre bdd de test doit être 1 car on a inséré une note durant le test*/
    }




}
