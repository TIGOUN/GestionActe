<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\ResultatSemestrielle;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ResultatSemestrielleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ResultatSemestrielle-list|ResultatSemestrielle-create|ResultatSemestrielle-edit|ResultatSemestrielle-delete', ['only' => ['index','show']]);
        $this->middleware('permission:ResultatSemestrielle-create', ['only' => ['create','store']]);
        $this->middleware('permission:ResultatSemestrielle-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ResultatSemestrielle-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::latest()->get();
        $semestrielles = ResultatSemestrielle::latest()->get();
        return view('admin.resultats.index', compact('departements','semestrielles'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'annee_academique' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
            'niveau' => 'required|string|max:255',
            'session' => 'required|string|max:255',
            'fichier' => 'mimes:pdf|max:2048',
        ]);


        ResultatSemestrielle::create([
            'annee_academique' => $request->annee_academique,
            'departement_id' => $request->departement_id,
            'niveau' => $request->niveau,
            'session' => $request->session,
            'fichier' => $request->hasFile('fichier') ? $request->file('fichier')->store('documents', 'public') : null,
        ]);

                Flashy::message('La programmation est ajouté avec succès');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ResultatSemestrielle $resultatSemestrielle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResultatSemestrielle $resultatSemestrielle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $resultatSemestrielle)
    {
        $resultatSemestrielle = ResultatSemestrielle::find($resultatSemestrielle);

        $this->validate($request,[
            'annee_academique' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
            'niveau' => 'required|string|max:255',
            'session' => 'required|string|max:255',
        ]);


        $resultatSemestrielle->update([
            'annee_academique' => $request->annee_academique,
            'departement_id' => $request->departement_id,
            'niveau' => $request->niveau,
            'session' => $request->session,
            'fichier' => $request->hasFile('fichier') ? $request->file('fichier')->store('documents', 'public') : $resultatSemestrielle->fichier,
        ]);

        Flashy::message('La programmation est mise à jour avec succès');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($resultatSemestrielle)
    {
        $resultatSemestrielle = ResultatSemestrielle::find($resultatSemestrielle);

        $resultatSemestrielle->delete();

        Flashy::message('La programmation est supprimé avec succès');

        return back();
    }
}