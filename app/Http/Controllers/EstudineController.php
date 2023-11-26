<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudineController extends Controller
{
    public function show()
    {
        return view('estudiantine.estudiantine');
    }
}