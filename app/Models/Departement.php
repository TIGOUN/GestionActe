<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departement extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function etudiant()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function demande()
    {
        return $this->hasMany(Demande::class);
    }


    public function resultat_semestriel()
    {
        return $this->hasMany(ResultatSemestrielle::class);
    }
}