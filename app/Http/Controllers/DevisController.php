<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function index()
    {
        $devis = Devis::orderBy('created_at', 'desc')->get();
        return view('devis.index')->with('devis', $devis);
    }

    public function show($id)
    {
        $devis = Devis::find($id);
        return view('devis.show')->with('devis', $devis);
    }

    public function create()
    {
        return view('devis.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => ['required', 'unique:devis'],
            'client' => ['required']
        ]);

        $devis = new Devis();
        $devis->titre = $request->titre;
        $devis->client = $request->client;
        $devis->save();

        return view('devis.show')->with('devis', $devis);
    }

    public function createPDF($id)
    {
        $devis = Devis::find($id);
        $pdf = PDF::loadView('fichiers.index', ['devis' => $devis]);
        return $pdf->stream();
    }

    public function showPDF($id)
    {
        $devis = Devis::find($id);
        return view('fichiers.index', ['devis' => $devis]);
    }
}
