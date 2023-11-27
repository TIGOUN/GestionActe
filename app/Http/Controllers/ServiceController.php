<?php

namespace App\Http\Controllers;

use App\Models\ProgrammationEvaluation;
use App\Models\ProgrammationSoutenance;
use App\Models\ResultatSemestrielle;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index');
    }


    public function index_progSout()
    {
        $soutenances = ProgrammationSoutenance::latest()->get();
        return view('services.soutenance', compact('soutenances'));
    }

    public function index_progEva()
    {
        $evaluations = ProgrammationEvaluation::latest()->get();
        return view('services.evaluation', compact('evaluations'));
    }

    public function index_progResul()
    {
        $semestrielles = ResultatSemestrielle::latest()->get();
        return view('services.semestrielle', compact('semestrielles'));
    }
}