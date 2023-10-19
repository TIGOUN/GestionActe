<?php

namespace App\Http\Controllers;

use App\Models\Acte;
use Illuminate\Http\Request;

class ActeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Acte-list|Acte-create|Acte-edit|Acte-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Acte-create', ['only' => ['create','store']]);
        $this->middleware('permission:Acte-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Acte-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actes = Acte::latest()->get();
        return view('admin.actes.index',compact('actes'));
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
            'nom' => ['required','unique:actes','string','max:255'],
            ]);

        if ($request->acte_parent_id==0) {
            $cat = null;
        } else {
            $cat = $request->acte_parent_id;
        }

        Acte::create([
            'code' => $request->code,
            'nom' => $request->nom,
            // 'prix' => $request->prix,
            'acte_parent_id' => $cat,
        ]);

        return redirect(route('acte.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Acte $acte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acte $acte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acte $acte)
    {
        $this->validate($request,[
            'nom' => ['required','unique:actes','string','max:255'],
            ]);

        if ($request->acte_parent_id==0) {
            $cat = null;
        } else {
            $cat = $request->acte_parent_id;
        }

        
            $acte->nom = $request->nom;
            // $acte->prix = $request->prix;
            $acte->acte_parent_id = $cat;
            $acte->save();

        return redirect(route('acte.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acte $acte)
    {
        $acte->delete();
        return redirect(route('acte.index'));
    }
}