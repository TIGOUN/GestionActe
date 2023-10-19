<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResultatSemestrielle extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}