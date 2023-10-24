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
        // dd($admissions);
        return view('admin.admissions.index', compact('admissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */


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