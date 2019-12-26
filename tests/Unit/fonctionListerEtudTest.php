<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Eleves;
use App\User;

class fonctionListerEtudTest extends TestCase
{
    use RefreshDatabase;

    /// Test qui vérifie la redirection vers le login si l'utilisateur n'est pas connecté
    /** @test */
    public function listeRedirigerVersLoginSiNonConnecter()
    {
        $response=$this->get("liste");
        $response->assertRedirect('login');
    }


    /** Test qui vérifie la redirection vers la page lister les étudiants
     ** si l'utilisateur  connecté est un enseignant*/
    /** @test */
    public function allerVersListeSiConnecter(){
        $this->actingAs(factory(User::class)->create([
            'name' =>'nom',
            'firstName' => 'nom',
            'profession' => 'enseignant',
        ])); /*on a généré un utilisateur enseignant*/
       $response=$this->get('liste')->assertOk(); /*asserOk: si le code de retour est 200*/
    }


    /**  Test qui vérifie la réussite de la requete GET et ainsi la lecture de la BDD et
      **l'affichage de la liste d'étudiants*/
    /** @test */
    public function verifierLectureBdd(){
        $this->actingAs(factory(User::class)->create([
            'name' =>'nom',
            'firstName' => 'nom',
            'profession' => 'enseignant',
        ])); /*on a généré un utilisateur enseignant*/

        
        $this->post('inscrire',[
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
        ]);
        $this->post('inscrire',[
            'nom' =>'nomEleve2',
            'prenom'=>'prenomEleve2',
            'dateNaiss'=>'2000-03-09',
            'lieuNaiss'=>'alger',
            'adr'=>'alger',
            'mail'=>'test2@gmail.com',
            'numIns'=>'127_9',
            'niveau'=>'1CS',
            'section'=>'A',
            'groupe'=>'2',
        ]);
        /*on a inséré 2 éléménts dans la bdd*/
        $this->assertCount(2,Eleves::all()); /*on vérifie si les 2 éléments sont bien insérés*/
        $response=$this->json('GET','/api/liste'); 
        $response->assertStatus(200);/*on vérifie si la requête get est réussie*/ 


    }

}
