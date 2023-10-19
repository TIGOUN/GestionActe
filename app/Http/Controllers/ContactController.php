<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Contact-list|Contact-create|Contact-edit|Contact-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Contact-create', ['only' => ['create','store']]);
        $this->middleware('permission:Contact-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Contact-delete', ['only' => ['destroy']]);
    }
    public function contact()
    {
        return view('contacts.index');
    }

    public function store(Request $request)
    {
        Contact::create([
            'nom_prenoms' => $request->input('nom_prenoms'),
            'email' => $request->input('email'),
            'sujet' => $request->input('sujet'),
            'message' => $request->input('message'),
        ]);

        return back();
    }


    public function somme()
    {
        return view('sommes.index');
    }
}