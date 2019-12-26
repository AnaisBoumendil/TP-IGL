<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/// Classe Eleves
///
/// Classe qui représente le model pour la table Eleves de la BDD.

class Eleves extends Model
{
    /// Regroupe les champs de la table 'Eleves' dans la BDD 
    /// @var array
    public $fillable=['nom','prenom','dateNaiss','lieuNaiss','adr','mail','numIns','niveau','section','groupe'];
}
