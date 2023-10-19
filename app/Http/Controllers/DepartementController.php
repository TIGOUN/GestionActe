<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Departement-list|Departement-create|Departement-edit|Departement-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Departement-create', ['only' => ['create','store']]);
        $this->middleware('permission:Departement-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Departement-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::latest()->get();
        return view('admin.departements.index', compact('departements'));
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
        $request->validate([
            'nom' => ['required','string','max:200']
        ]);

        Departement::create([
            'code' => $request->code,
            'nom' => $request->nom
        ]);

        return redirect()->route('departement.index')->with('L\'élément ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            'nom' => ['required','string','max:50']
        ]);
        
        $departement->nom = $request->nom;
        $departement->save();

        return redirect()->route('departement.index')->with('Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect(route('departement.index'))->with('Suppression avec succès');
    }
}