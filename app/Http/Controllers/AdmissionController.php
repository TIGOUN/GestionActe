<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Demande;
use Illuminate\Http\Request;
use Symfony\Component\Uid\NilUlid;

class AdmissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Admission-list|Admission-create|Admission-edit|Admission-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Admission-create', ['only' => ['create','store']]);
        $this->middleware('permission:Admission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Admission-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admissions = Admission::latest()->get();
        return view('admin.admissions.index', compact('admissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('ok');

        // $this->validate($request,[
        //     'nom' => 'required|string|max:255',
        //     'prenoms' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:admissions', 
        //     'pays_residence' => 'required|string|max:255',
        //     'pays_provenance' => 'required|string|max:255',
        //     'sujet' => 'required|string|max:255',
        //     'fichier' => 'mimes:pdf|max:2048', 
        //     'message' => 'required|string',
        // ]);


        Admission::create([
            'nom' => $request->input('nom'),
            'prenoms' => $request->input('prenoms'),
            'email' => $request->input('email'),
            'pays_residence' => $request->input('pays_residence'),
            'pays_provenance' => $request->input('pays_provenance'),
            'sujet' => $request->input('sujet'),
            'fichier' => $request->hasFile('fichier') ? $request->file('fichier')->store('documents', 'public') : null,
            'message' => $request->input('message'),
            'status' => 'En attente',
            'motif_refus' => null,
            'fichier_admission' => null,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Admission $admission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admission $admission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admission $admission)
    {
        if($request->status=="valider")
        {
            $request->validate([
                // 'fichier_admission' => 'mimes:pdf|max:2048',
            ]);
            
            $name_file =  $request->file('fichier_admission')->store('documents', 'public');

            $admission->update([
                'fichier_admission' => $name_file,
                'motif_refus' => null,
                'status' => 'Accepté'
            ]);
            
            return redirect(route('admission.index'));
        }else if($request->status=="rejeter"){
            
            $request->validate([
                'motif_refus' => 'required|string|max:500'
            ]);

            $admission->update([
                'fichier_admission' => null,
                'motif_refus' => $request->motif_refus,
                'status' => 'Rejeté'
            ]);

            return redirect(route('admission.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admission $admission)
    {
        $admission->delete();
        return back();
    }
}