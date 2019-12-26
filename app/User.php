<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Regroupe les champs visible de la table 'User' dans la BDD
     *
     * @var array
     */
    protected $fillable = [
        'name','firstName','profession', 'email', 'password',
    ];

    
     // Regroupe les champs protégés (cachés) de la table 'User' dans la BDD
     
     // @var array
     
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /// Fonction isAdminWorker
    /// Permet de vérifier si l'utilisateur fait partie de l'administration
    /// @returns boolean
    public function isAdminWorker(){
        return ($this->profession=="administration");
    }

    /// Fonction isTeacher
    /// Permet de vérifier si l'utilisateur est un enseignant
    /// @returns boolean
    public function isTeacher(){
        return ($this->profession=="enseignant");
    }
}
