<?php

namespace App\Http\Controllers;

use App\Models\ProgrammationEvaluation;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ProgrammationEvaluationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ProgrammationEvaluation-list|ProgrammationEvaluation-create|ProgrammationEvaluation-edit|ProgrammationEvaluation-delete', ['only' => ['index','show']]);
        $this->middleware('permission:ProgrammationEvaluation-create', ['only' => ['create','store']]);
        $this->middleware('permission:ProgrammationEvaluation-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ProgrammationEvaluation-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluations = ProgrammationEvaluation::latest()->get();
        return view('admin.evaluations.index', compact('evaluations'));
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
            'session' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'date_debut' => 'required|string|max:255',
            'date_fin' => 'required|string|max:255', 
            'fichier' => 'mimes:pdf|max:2048',
        ]);

        ProgrammationEvaluation::create([
            'session' => $request->input('session'),
            'classe' => $request->input('classe'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'fichier' => $request->hasFile('fichier') ? $request->file('fichier')->store('documents', 'public') : null,
        ]);

        Flashy::message('La programmation des évaluations est crée avec succès');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgrammationEvaluation $programmationEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgrammationEvaluation $programmationEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $programmationEvaluation)
    {
        $programmationEvaluation = ProgrammationEvaluation::find($programmationEvaluation);

        // dd($programmationEvaluation);
        $this->validate($request,[
            'session' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'date_debut' => 'required|string|max:255',
            'date_fin' => 'required|string|max:255', 
        ]);

        $programmationEvaluation->update([
            'session' => $request->input('session'),
            'classe' => $request->input('classe'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'fichier' => $request->hasFile('fichier') ? $request->file('fichier')->store('documents', 'public') : $programmationEvaluation->fichier,
        ]);


        Flashy::message('La programmation des évaluations est mise à jour avec succès');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($programmationEvaluation)
    {
        $programmationEvaluation = ProgrammationEvaluation::find($programmationEvaluation);

        $programmationEvaluation->delete();

        Flashy::message('La programmation des évaluations est supprimé avec succès');
        return back();
    }
}