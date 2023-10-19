<?php

namespace App\Http\Controllers;

use App\Models\Acte;
use App\Models\Admission;
use App\Models\Demande;
use App\Models\Departement;
use App\Models\Post;
use App\Models\ProgrammationEvaluation;
use App\Models\ProgrammationSoutenance;
use App\Models\ResultatSemestrielle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  

        $demandesParMois = DB::table('demandes')
        ->select(DB::raw("MONTH(created_at) as mois"), DB::raw('COUNT(*) as nombre_demandes'))
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->get();

        $demandesParDepartement = DB::table('demandes')
        ->join('etudiants', 'demandes.etudiant_id', '=', 'etudiants.id')
        ->join('departements', 'etudiants.departement_id', '=', 'departements.id')
        ->select('departements.nom as departement', DB::raw('count(*) as nombre_demandes'))
        ->groupBy('departements.nom')
        ->get();


        $demandesParAn = DB::table('demandes')
        ->select(DB::raw('YEAR(created_at) as annee'), DB::raw('count(*) as nombre_demandes'))
        ->groupBy(DB::raw('YEAR(created_at)'))
        ->get();

        $admissionsParAn = DB::table('admissions')
        ->select(DB::raw('YEAR(created_at) as annee'), DB::raw('count(*) as nombre_admissions'))
        ->groupBy(DB::raw('YEAR(created_at)'))
        ->get();

        $all_posts = Post::all()->count();
        $all_demandes = Demande::all()->count();
        $all_admissions = Admission::all()->count();
        $all_actes = Acte::all()->count();
        $all_users = User::all()->count();
        $all_departements = Departement::all()->count();
        $all_resultats = ResultatSemestrielle::all()->count();
        $all_articles = Post::all()->count();
        $all_soutenances = ProgrammationSoutenance::all()->count();
        $all_evaluations = ProgrammationEvaluation::all()->count();
        
        $d_v = Demande::where('statut_reponse',"Valider")->count();
        $d_r = Demande::where('statut_reponse',"Rejeter")->count();
        $d_en = Demande::where('statut_reponse',"En attente")->count();
        
        $a_v = Admission::where('status',"Accepté")->count();
        $a_r = Admission::where('status',"Rejeté")->count();
        $a_en = Admission::where('status',"En attente")->count();
        

        return view('home',compact(
            'd_v',
            'd_r',
            'd_en',
            'a_v',
            'a_r',
            'a_en',
            'all_resultats',
            'all_articles',
            'all_soutenances',
            'all_evaluations',
            'all_users',
            'all_departements',
            'all_posts',
            'all_demandes',
            'all_admissions',
            'all_actes',
        'admissionsParAn',
        'demandesParMois',
        'demandesParDepartement',
        'demandesParAn'));
    }
}