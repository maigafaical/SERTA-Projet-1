<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::all();
        return view('Transactions.liste', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Transactions.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'devise'=>'required',
            'change'=>'required',
            'taux'=>'required',
            'lieu'=>'required',
            
            'date'=>'required',
            'destination'=>'required',
            'expediteur'=>'required',
            'contact_expediteur'=>'required',
            'destinataire'=>'required',
            'contact_destinataire'=>'required',
            'montant_envoye_depart'=>'required',
            'montant_envoye_cfa'=>'required',
            'frais_envoie'=>'required',
            'montant_recupere'=>'required',

        ]);

        $transactions = new Transactions();
        $transactions->devise = $request->devise;
        $transactions->change = $request->change;
        $transactions->taux = $request->taux;
        $transactions->lieu = $request->lieu;
        $transactions->frais_envoie = $request->frais_envoie;
        $transactions->date = $request->date;
        $transactions->destination = $request->destination;
        $transactions->expediteur = $request->expediteur;
        $transactions->contact_expediteur = $request->contact_expediteur;
        $transactions->destinataire = $request->destinataire;
        $transactions->contact_destinataire = $request->contact_destinataire;
        $transactions->montant_envoye_depart = $request->montant_envoye_depart;
        $transactions->montant_envoye_cfa = $request->montant_envoye_cfa;
        $transactions->montant_recupere = $request->montant_recupere;
        

        $transactions->save();

        return redirect()->route('transactions.index')->with('status', 'Une nouvelle transaction a ajoutée avec succes.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('Transactions.details',[

            'transactions' => Transactions::find($id)

      ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transactions = Transactions::find($id);
        return view('Transactions.modifier',compact('transactions'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transactions = Transactions::find($id);

        $transactions->update([
            'devise' => $request->devise,
            'change' => $request->change,
            'taux' => $request->taux,
            'lieu' => $request->lieu,
            'date' => $request->date,
            'destination' => $request->destination,
            'expediteur'  => $request->expediteur,
            'contact_expediteur' => $request->contact_expediteur,
            'destinataire' => $request->destinataire,
            'contact_destinataire' => $request->contact_destinataire,
            'montant_envoye_depart' => $request->montant_envoye_depart,
            'montant_envoye_cfa' => $request->montant_envoye_cfa,
            'frais_envoie' => $request->frais_envoie,
            'montant_recupere' => $request->montant_recupere,
            
        ]);

        return redirect()->route('transactions.index')->with('status', 'Une Transactions  été modifiée avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transactions = Transactions::find($id);
        $transactions->delete();
        return redirect()->route('transactions.index')->with('status', 'Transaction supprimée avec succes.');
    }
}
