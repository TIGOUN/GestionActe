<?php

namespace App\Http\Controllers;

use App\Mail\EmailReponseRejeter;
use App\Mail\EmailReponseValider;
use App\Mail\EnvoisCodeDeDemande;
use App\Mail\ReponseDemandeApresValidation;
use App\Models\Demande;
use App\Models\Document;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Paiement;
use App\Models\Reponse;
use App\Models\Validation;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use MercurySeries\Flashy\Flashy;
use Vonage\Voice\NCCO\NCCO;

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
                return view('searchs.search',compact('demande'));
            }else{
                Flashy::error('Aucun résultat trouvé pour cette demande');
                return redirect(route('form.search'));
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

        $data = [
                    'code_demande' => $demande->code_demande,
                    'nom' => $demande->etudiant->nom,
                    'prenoms' => $demande->etudiant->prenoms,
                    'motif_refus' => $request->motif_refus,
                    'images' => 'client/img/lo.png'
                ];

                // Mail::to($demande->etudiant->email)->send(new EmailReponseValider($data));

        
        Flashy::message('Demande signé avec succès, vous pouvez télécharger votre demande maintenant !!!');
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
                
                
                
            // Debut

            // $client = new Client();
            // // Remplacez les valeurs suivantes par les vôtres
            // $baseUrl = 'https://dmq6r1.api.infobip.com/tts/3/single';
            // $authorization = 'App 3dde520a26cf6a4d67712ef72a291e9d-5f0080ac-317e-4bb8-a344-136dcd89a556';

            // $data = [
            //     "text" => "Bonjour, ici le service de scolarité de la Faculté des Sciences Humaines et Sociales d'Abomey-Calavi. Votre demande d\'acte académique enregistré sous le numéro ".$demande->code_demande." a été traité. Merci !!!",
            //     "language" => "en",
            //     "voice" => [
            //         "name" => "Joanna",
            //         "gender" => "female",
            //     ],
            //     "from" => "22961074420",
            //     "to" => "22991275862",
            // ];

            // try {
            //     $response = $client->post($baseUrl, [
            //         'headers' => [
            //             'Authorization' => $authorization,
            //             'Content-Type' => 'application/json',
            //             'Accept' => 'application/json',
            //         ],
            //         'json' => $data,
            //     ]);

            //     // Vous pouvez traiter la réponse ici
            //     $responseBody = $response->getBody()->getContents();
            //     return $responseBody;
            // } catch (\Exception $e) {
            //     // Gérer les erreurs ici
            //     return $e->getMessage();
            // }

            // Fin







// $filePath = public_path('/admin/keys/private.key');
// $privateKey = file_get_contents($filePath);
// $apiKey = 'db605a07';

// $keypair = new \Vonage\Client\Credentials\Keypair($privateKey, $apiKey);

// $client = new \Vonage\Client($keypair);

// $outboundCall = new \Vonage\Voice\OutboundCall(
//     new \Vonage\Voice\Endpoint\Phone(+22991275862),
//     new \Vonage\Voice\Endpoint\Phone(+22969360869)
// );

// $ncco = new NCCO();
// $ncco->addAction(new \Vonage\Voice\NCCO\Action\Talk("Bonjour, ici le service de scolarité de la Faculté des Sciences Humaines et Sociales d'Abomey-Calavi. Votre demande d\'acte académique enregistré sous le numéro ".$demande->code_demande." a été traité. Merci !!!"));
// $outboundCall->setNCCO($ncco);

// $response = $client->voice()->createOutboundCall($outboundCall);

// var_dump($response);

        $data = [
                    'code_demande' => $demande->code_demande,
                    'nom' => $demande->etudiant->nom,
                    'prenoms' => $demande->etudiant->prenoms,
                    'motif_refus' => $request->motif_refus,
                    'images' => 'client/img/lo.png'
                ];

                Mail::to($demande->etudiant->email)->send(new ReponseDemandeApresValidation($data));

                Flashy::message('La réponse à la demande a été bien envoyé à l\'étudiant !!!');
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

                $data = [
                    'code_demande' => $demande->code_demande,
                    'nom' => $demande->etudiant->nom,
                    'prenoms' => $demande->etudiant->prenoms,
                    'motif_refus' => $request->motif_refus,
                    'images' => 'client/img/lo.png'
                    ];


                Mail::to($demande->etudiant->email)->send(new EmailReponseRejeter($data));
                
                Flashy::message('La réponse à la demande a été bien envoyé à l\'étudiant !!!');
                return redirect(route('demande.index'));
            }
        }

    // public function enattente()
    // {
    //     $demandes = Demande::where('statut_reponse','En attente')->get();
    //     return view('admin.demandes.enattente',compact('demandes'));
    // }

    // public function valider()
    // {
    //     $demandes = Demande::where('statut_reponse','Valider')->get();
    //     return view('admin.demandes.index',compact('demandes'));
    // }

    // public function rejeter()
    // {
    //     $demandes = Demande::where('statut_reponse','Rejeter')->get();
    //     return view('admin.demandes.index',compact('demandes'));
    // }
  
}