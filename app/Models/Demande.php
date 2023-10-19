<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demande extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function acte()
    {
        return $this->belongsTo(Acte::class);
    }

    public function reponse()
    {
        return $this->belongsTo(Reponse::class);
    }

    public function paiement()
    {
        return $this->belongsTo(Paiement::class);
    }

    public function validation()
    {
        return $this->belongsTo(Validation::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    // generate code Demande
    public static     function genererCodeDemande()
    {
        $anneeActuelle = substr(date('Y'), -2);
        $codePrefixe = 'DA' . $anneeActuelle . '-';
        
        $dernierCode = Demande::where('code_demande', 'LIKE', 'DA'.$anneeActuelle.'-%')
            ->orderBy('code_demande', 'desc')
            ->first();
        
        if ($dernierCode) {
            $dernierNumero = intval(substr($dernierCode->code_demande, -4));
            $nouveauNumero = $dernierNumero + 1;
        } else {
            $nouveauNumero = 1;
        }
        
        $nouveauNumero = str_pad($nouveauNumero, 4, '0', STR_PAD_LEFT);
        $codeFinal = $codePrefixe . $nouveauNumero;
        return $codeFinal;
    }
}