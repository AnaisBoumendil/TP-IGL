<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Eleves;
use App\User;

class fonctionInscrireEtudTest extends TestCase
{
    use RefreshDatabase;

    /// Test qui vérifie la redirection vers le login si l'utilisateur n'est pas connecté
    /** @test */
    public function inscrireRedirigerVersLoginSiNonConnecter()
    {
        $response=$this->get("inscrire");
        $response->assertRedirect('login');
    }


    /** Test qui vérifie la redirection vers la page d'inscription des étudiants
     **si l'utilisateur  connecté fait partie de l'administration*/
    /** @test */
    public function allerVersInscrireSiConnecter(){
        $this->actingAs(factory(User::class)->create([
            'name' =>'nom',
            'firstName' => 'nom',
            'profession' => 'administration',
        ])); /*on a généré un utilisateur travaillant dans l'administration*/
       $response=$this->get('inscrire')->assertOk(); /*asserOk: si le code de retour est 200*/
    }

    
    /// Test qui vérifie si l'étudiant est inscrit et inséré dans la base de données 
    /** @test */
    public function verifierInsertionEleveDansBdd(){
        $this->actingAs(factory(User::class)->create([
            'name' =>'nom',
            'firstName' => 'nom',
            'profession' => 'administration',
        ])); /*on a généré un utilisateur travaillant dans l'administration*/
        $response=$this->post('inscrire',[
            'nom' =>'nomEleve',
            'prenom'=>'prenomEleve',
            'dateNaiss'=>'2000-03-09',
            'lieuNaiss'=>'alger',
            'adr'=>'alger',
            'mail'=>'test@gmail.com',
            'numIns'=>'126_9',
            'niveau'=>'1CS',
            'section'=>'A',
            'groupe'=>'2',
        ]); /*on remplit les champs de la table Eleves de la bdd*/
        $response->assertStatus(200); /*pour vérifier si la requête POST est réussie*/
        $this->assertCount(1,Eleves::all()); 
        /*le nombre d'élément dans notre bdd de test doit être 1 car on a inséré un éléve durant le test*/
    }
}
