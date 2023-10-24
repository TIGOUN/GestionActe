<?php

namespace App\Http\Controllers;

use App\Mail\EmailReponseRejeter;
use App\Mail\EmailReponseValider;
use App\Mail\EnvoisCodeDeDemande;
use App\Models\Demande;
use App\Models\Document;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Paiement;
use App\Models\Reponse;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemandeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Demande-list|Demande-create|Demande-edit|Demande-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Demande-create', ['only' => ['create','store']]);
        $this->middleware('permission:Demande-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Demande-delete', ['only' => ['destroy']]);
    }
    public function search()
    {
        $q = request()->input('search_demande');
        
            $demande = Demande::where('code_demande',$q)->first();
            // dd($demande);
            if($demande)
            {
                // dd($demande);
                return view('searchs.search',compact('demande'));
            }else{
                // dd('ok');
                return view('searchs.search',compact('demande'));
            }
    }


    public function signer(Request $request, Demande $demande)
    {     
        // dd($demande);
        $demande->update([
            'signature' => $request->signature,
        ]);
        
        return view('searchs.search',compact('demande'));
    }


    public function rapport(Demande $demande)
    {
        return view('admin.demandes.rapport', compact('demande'));
    }


    public function form()
    {
        return view('searchs.form');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::latest()->get();
        return view('admin.demandes.index',compact('demandes'));
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
        // code vérification des erreurs venant des champs
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenoms' => 'required|string|max:255',
                'email' => 'required|email',
                'date_naissance' => 'required|date',
                'lieu_naissance' => 'required|string|max:255',
                'matricule' => 'required|string|max:255',
                'contacts' => 'required|string|max:255',
                'option' => 'required|string|max:255',
                'departement_id' => 'required|exists:departements,id',
                'acte_id' => 'required|exists:actes,id',
                'intitules_eu' => 'nullable|string',
                'reference' => 'unique:paiements|required|string|max:255',
                'preuve_paiement' => 'required|mimes:pdf|max:2048',
                'copie_acte_naissance' => 'mimes:pdf|max:2048',
                'copie_fiche_preinscription' => 'mimes:pdf|max:2048',
                'copie_carte_etudiant' => 'mimes:pdf|max:2048',
                'certificat_de_perte' => 'mimes:pdf|max:2048',
                'copie_acte_perdu' => 'mimes:pdf|max:2048',
                'copie_quittance_frais_soutenance' => 'mimes:pdf|max:2048',
                'originale_quitus' => 'mimes:pdf|max:2048',
                'programmation_de_la_soutenance' => 'mimes:pdf|max:2048',
                'piece_suscite' => 'mimes:pdf|max:2048',
                'original_acte_certifie' => 'mimes:pdf|max:2048',
                'copie_acte_certifie' => 'mimes:pdf|max:2048',
                'copie_photo_identite' => 'mimes:pdf|max:2048',
                'originale_attestation' => 'mimes:pdf|max:2048',
                'copie_des_releves_notes' => 'mimes:pdf|max:2048',
                'copie_releve_1' => 'mimes:pdf|max:2048',
                'copie_releve_2' => 'mimes:pdf|max:2048',
                'copie_releve_3' => 'mimes:pdf|max:2048',
                'copie_releve_4' => 'mimes:pdf|max:2048',
                'copie_releve_5' => 'mimes:pdf|max:2048',
                'licence_1' => 'required|string|max:255',
                'licence_2' => 'nullable|string|max:255',
                'licence_3' => 'nullable|string|max:255',
                'master_1' => 'nullable|string|max:255',
                'master_2' => 'nullable|string|max:255',
            ]);

                if($request->hasFile('copie_releve_1'))
                {
                    foreach($request->file('copie_releve_1') as $image)
                    {
                        $name_file = $image->store('documents','public');
                        $copie_releve_1[] = $name_file;
                    }
                }else{
                    $copie_releve_1 = null;
                }

                if($request->hasFile('copie_releve_2'))
                {
                    foreach($request->file('copie_releve_2') as $image)
                    {
                        $name_file = $image->store('documents','public');
                        $copie_releve_2[] = $name_file;
                    }
                }else{
                    $copie_releve_2 = null;
                }


                if($request->hasFile('copie_releve_3'))
                {
                    foreach($request->file('copie_releve_3') as $image)
                    {
                        $name_file = $image->store('documents','public');
                        $copie_releve_3[] = $name_file;
                    }
                }else{
                    $copie_releve_3 = null;
                }


                if($request->hasFile('copie_releve_4'))
                {
                    foreach($request->file('copie_releve_4') as $image)
                    {
                        $name_file = $image->store('documents','public');
                        $copie_releve_4[] = $name_file;
                    }
                }else{
                    $copie_releve_4 = null;
                }


                if($request->hasFile('copie_releve_5'))
                {
                    foreach($request->file('copie_releve_5') as $image)
                    {
                        $name_file = $image->store('documents','public');
                        $copie_releve_5[] = $name_file;
                    }
                }else{
                    $copie_releve_5 = null;
                }

        // Les fichiers pour enregistrer les fichiers Documents
            $document = Document::create([
                'copie_acte_naissance' => $request->hasFile('copie_acte_naissance') ? $request->file('copie_acte_naissance')->store('documents', 'public') : null,
                'copie_fiche_preinscription' => $request->hasFile('copie_fiche_preinscription') ? $request->file('copie_fiche_preinscription')->store('documents', 'public') : null,
                'copie_carte_etudiant' => $request->hasFile('copie_carte_etudiant') ? $request->file('copie_carte_etudiant')->store('documents', 'public') : null,
                'certificat_de_perte' => $request->hasFile('certificat_de_perte') ? $request->file('certificat_de_perte')->store('documents', 'public') : null,
                'copie_acte_perdu' => $request->hasFile('copie_acte_perdu') ? $request->file('copie_acte_perdu')->store('documents', 'public') : null,
                'copie_quittance_frais_soutenance' => $request->hasFile('copie_quittance_frais_soutenance') ? $request->file('copie_quittance_frais_soutenance')->store('documents', 'public') : null,
                'originale_quitus' => $request->hasFile('originale_quitus') ? $request->file('originale_quitus')->store('documents', 'public') : null,
                'programmation_de_la_soutenance' => $request->hasFile('programmation_de_la_soutenance') ? $request->file('programmation_de_la_soutenance')->store('documents', 'public') : null,
                'piece_suscite' => $request->hasFile('piece_suscite') ? $request->file('piece_suscite')->store('documents', 'public') : null,
                'original_acte_certifie' => $request->hasFile('original_acte_certifie') ? $request->file('original_acte_certifie')->store('documents', 'public') : null,
                'copie_acte_certifie' => $request->hasFile('copie_acte_certifie') ? $request->file('copie_acte_certifie')->store('documents', 'public') : null,
                'copie_photo_identite' => $request->hasFile('copie_photo_identite') ? $request->file('copie_photo_identite')->store('documents', 'public') : null,
                'originale_attestation' => $request->hasFile('originale_attestation') ? $request->file('originale_attestation')->store('documents', 'public') : null,
                'copie_des_releves_notes' => $request->hasFile('copie_des_releves_notes') ? $request->file('copie_des_releves_notes')->store('documents', 'public') : null,
                'copie_releve_1' => json_decode($copie_releve_1),
                'copie_releve_2' => json_decode($copie_releve_2),
                'copie_releve_3' => json_decode($copie_releve_3),
                'copie_releve_4' => json_decode($copie_releve_4),
                'copie_releve_5' => json_decode($copie_releve_5),
            ]);

        // Paiement
            $paiement = Paiement::create([
                'preuve_paiement' => $request->hasFile('preuve_paiement') ? $request->file('preuve_paiement')->store('documents', 'public') : null,
                'reference' => $request->reference,
            ]);

        // Création d'une nouvelle instance d'Etudiant avec les données validées
            $etudiant = Etudiant::create([
                'nom' => $request->nom,
                'prenoms' => $request->prenoms,
                'email' => $request->email,
                'date_naissance' => $request->date_naissance,
                'lieu_naissance' => $request->lieu_naissance,
                'matricule' => $request->matricule,
                'contacts' => $request->contacts,
                'option' => $request->option,
                'departement_id' => $request->departement_id,
            ]);

        // Créez une nouvelle instance de Validation avec les données validées
            $validation = Validation::create([
                'licence_1' => $request->licence_1 ? $request->licence_1 : '',
                'licence_2' => $request->licence_2 ? $request->licence_2 : '',
                'licence_3' => $request->licence_3 ? $request->licence_1 : '',
                'master_1' => $request->master_1 ? $request->master_1 : '', 
                'master_2' => $request->master_2 ? $request->master_2 : '',
            ]);

        // Creer les matieres renseigner
            $matiere = Matiere::create([
                'intitules_eu' => $request->intitules_eu
            ]);

        // Reponse
            $reponse = Reponse::create([
                'acte_demande'=> null,
                'motif_refus' => null,
            ]);
            
        // Creer la demande
        $demande = Demande::create([
            'code_demande' => Demande::genererCodeDemande(),
            'statut_reponse' => "En attente",
            'signature' => null,
            'document_id' => $document->id,
            'paiement_id' => $paiement->id,
            'reponse_id' => $reponse->id,
            'acte_id' => $request->acte_id,
            'etudiant_id' => $etudiant->id,
            'matiere_id' => $matiere->id,
            'validation_id' => $validation->id,
        ]);
/****** */
        $msg = "Mr/Mdme ".$request->nom." votre demande d'acte académique est enregistré sous le numéro ".$demande->code_demande;

        $basic  = new \Vonage\Client\Credentials\Basic("db605a07", "75qROH1Zjvg7ozeG");
        $client = new \Vonage\Client($basic);


        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($request->contacts, "FASHS-UAC", $msg)
        );

        $message = $response->current();
/******* */
        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }
        // dd($request);

        
        $demande = [
            'code_demande' => $demande->code_demande,
            'nom' => $demande->etudiant->nom,
            'prenoms' => $demande->etudiant->prenoms,
        ];
        Mail::to($request->email)->send(new EnvoisCodeDeDemande($demande));

        return redirect(route('relever.premiere')); 
    }


        public function reponse_demande(Request $request,Reponse $reponse)
        {
            if($request->status=="valider")
            {
                $request->validate([
                    // 'acte_demande' => 'mimes:pdf|max:2048',
                ]);
                
                $pdf = $request->file('acte_demande');
                foreach($pdf as $acte)
                {
                    $name_file = $acte->store('documents','public');
                    $acte_reponse[] = $name_file;
                }

                $reponse->update([
                    'acte_demande' => json_encode($acte_reponse),
                    'motif_refus' => null
                ]);
                
                $demande = Demande::find($request->id_demande);

                $demande->update([
                    'statut_reponse' => "Valider"
                ]);
                
                Mail::to($demande->etudiant->email)->send(new EmailReponseValider($demande));
                return redirect(route('demande.index'));
            }else if($request->status=="rejeter"){
                
                $request->validate([
                    'motif_refus' => 'required|string|max:500'
                ]);

                $reponse->update([
                    'acte_demande' => null,
                    'motif_refus' => $request->motif_refus,
                ]);
                $demande = Demande::find($request->id_demande);
                $demande->update([
                    'statut_reponse' => "Rejeter"
                ]);
                
                Mail::to($demande->etudiant->email)->send(new EmailReponseRejeter($demande));
                return redirect(route('demande.index'));
            }
        }

    public function enattente()
    {
        $demandes = Demande::where('statut_reponse','En attente')->get();
        return view('admin.demandes.enattente',compact('demandes'));
    }

    public function valider()
    {
        $demandes = Demande::where('statut_reponse','Valider')->get();
        return view('admin.demandes.index',compact('demandes'));
    }

    public function rejeter()
    {
        $demandes = Demande::where('statut_reponse','Rejeter')->get();
        return view('admin.demandes.index',compact('demandes'));
    }
  
}