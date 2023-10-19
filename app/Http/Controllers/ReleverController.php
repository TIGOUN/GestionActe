<?php

namespace App\Http\Controllers;

use App\Models\Acte;
use App\Models\Departement;
use Illuminate\Http\Request;

class ReleverController extends Controller
{
    public function premiere()
    {
        $actes = Acte::latest()->get();
        $departements = Departement::latest()->get();
        return view('form_academique.releves.premiereannee',compact('departements','actes'));
    }

    public function deuxieme()
    {
        return view('form_academique.releves.deuxiemeannee');
    }

    public function troisieme()
    {
        return view('form_academique.releves.troisiemeannee');
    }

    public function quatrieme()
    {
        return view('form_academique.releves.quatriemeannee');
    }

    public function cinquieme()
    {
        return view('form_academique.releves.cinquiemeannee');
    }

    public function doctorat()
    {
        return view('form_academique.releves.doctorat');
    }
}