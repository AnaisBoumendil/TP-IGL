<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleves extends Model
{
    public $fillable=['nom','prenom','dateNaiss','lieuNaiss','adr','mail','numIns','niveau'];
}
