<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function education()
    {
        return view('filieres.education');
    }

    public function enseignant()
    {
        return view('filieres.enseignant');
    }

    public function etudesetprospectives()
    {
        return view('filieres.etudesetprospectives');
    }

    public function genre()
    {
        return view('filieres.genre');
    }

    public function geographie()
    {
        return view('filieres.geographie');
    }

    public function histoire()
    {
        return view('filieres.histoire');
    }

    public function philosophie()
    {
        return view('filieres.philosophie');
    }

    public function psychologie()
    {
        return view('filieres.psychologie');
    }

    public function sociologie()
    {
        return view('filieres.sociologie');
    }

        public function condif()
    {
        return view('termes.confidentialite');
    }

        public function utili()
    {
        return view('termes.utilisations');
    }
}