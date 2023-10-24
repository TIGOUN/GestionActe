<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionUserController extends Controller
{
    public function create()
    {
        return view('admissions.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admissions', 
            'pays_residence' => 'required|string|max:255',
            'pays_provenance' => 'required|string|max:255',
            'sujet' => 'required|string|max:255',
            'fichier' => 'mimes:pdf|max:5120', 
            'message' => 'string',
        ]);

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

        return redirect(route('admission.index'))->with('success','Enregistrer avec succès un mail vous a été envoyer.');
    }
}