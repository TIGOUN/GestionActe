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

    public function store()
    {
        
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
                
                // Mail::to($demande->etudiant->email)->send(new EmailReponseValider($demande));

            // Debut

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://dmq6r1.api.infobip.com/tts/3/single',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{"text":"Bonjour, ici le service de scolarité de la Faculté des Sciences Humaines et Sociales.","language":"fr","voice":{"name":"Joanna","gender":"female"},"from":"22959814321","to":"'.$demande->contacts.'"}',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: {authorization}',
                    'Content-Type: application/json',
                    'Accept: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

            // Fin






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






/****** */
        // $msg = "Mr/Mdme ".$request->nom." votre demande d'acte académique est enregistré sous le numéro ".$demande->code_demande;

        // $basic  = new \Vonage\Client\Credentials\Basic("db605a07", "75qROH1Zjvg7ozeG");
        // $client = new \Vonage\Client($basic);


        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($request->contacts, "FASHS-UAC", $msg)
        // );

        // $message = $response->current();
/******* */
        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }
        // dd($request);