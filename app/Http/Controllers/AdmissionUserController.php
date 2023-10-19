<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionUserController extends Controller
{
    public function create()
    {
        return view('admissions.create');
    }
}