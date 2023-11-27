<?php

namespace App\Http\Controllers;

use App\Models\ProgrammationSoutenance;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ProgrammationSoutenanceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ProgrammationSoutenance-list|ProgrammationSoutenance-create|ProgrammationSoutenance-edit|ProgrammationSoutenance-delete', ['only' => ['index','show']]);
        $this->middleware('permission:ProgrammationSoutenance-create', ['only' => ['create','store']]);
        $this->middleware('permission:ProgrammationSoutenance-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ProgrammationSoutenance-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soutenances = ProgrammationSoutenance::latest()->get();
        return view('admin.soutenances.index', compact('soutenances'));
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
            'date_debut' => 'required|string|max:255',
            'date_fin' => 'required|string|max:255', 
            'fichier' => 'mimes:pdf|max:2048',
        ]);

        ProgrammationSoutenance::create([
            'session' => $request->input('session'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'fichier' => $request->hasFile('fichier') ? $request->file('fichier')->store('documents', 'public') : null,
        ]);

        Flashy::message('La programmation de la soutenance est ajouté avec succès');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgrammationSoutenance $programmationSoutenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgrammationSoutenance $programmationSoutenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $programmationSoutenance)
    {
        $programmationSoutenance = ProgrammationSoutenance::find($programmationSoutenance);

        $this->validate($request,[
            'session' => 'required|string|max:255',
            'date_debut' => 'required|string|max:255',
            'date_fin' => 'required|string|max:255',
        ]);

        $programmationSoutenance->update([
            'session' => $request->input('session'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'fichier' => $request->hasFile('fichier') ? $request->file('fichier')->store('documents', 'public') : $programmationSoutenance->fichier,
        ]);

        Flashy::message('La programmation de la soutenance est mise à jour avec succès');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($programmationSoutenance)
    {
        $programmationSoutenance = ProgrammationSoutenance::find($programmationSoutenance);
        $programmationSoutenance->delete();

        Flashy::message('La programmation de la soutenance est supprimé avec succès');
        return back();
    }
}