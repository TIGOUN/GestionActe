<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acte extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function demande()
    {
        return $this->hasMany(Demande::class, 'code_acte');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Acte::class, 'acte_parent_id');
    }

    /**
     * Get the child categories of the category.
     */
    public function childCategories()
    {
        return $this->hasMany(Acte::class, 'acte_parent_id');
    }
}