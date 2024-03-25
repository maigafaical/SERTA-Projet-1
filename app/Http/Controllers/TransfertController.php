<?php

namespace App\Http\Controllers;

use App\Models\Transfert;
use Illuminate\Http\Request;

class TransfertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfert = Transfert::all();
        return view('Transfert.liste', compact('transfert'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Transfert.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'devise' => 'required',
            'taux' => 'required',
            'lieu' => 'required',
            'date' => 'required',
            'destination' => 'required',
            'expediteur' => 'required',
            'contact_expediteur' => 'required',
            'destinataire' => 'required',
            'contact_destinataire' => 'required',
            'montant_envoye_depart' => 'required',
        ]);

        $transfert = new Transfert();
        $transfert->devise = $request->devise;
        $transfert->taux = $request->taux;
        $transfert->lieu = $request->lieu;
        $transfert->date = $request->date;
        $transfert->destination = $request->destination;
        $transfert->expediteur = $request->expediteur;
        $transfert->contact_expediteur = $request->contact_expediteur;
        $transfert->destinataire = $request->destinataire;
        $transfert->contact_destinataire = $request->contact_destinataire;
        $transfert->montant_envoye_depart = $request->montant_envoye_depart;

        // Calcul du montant envoyé en CFA
        $montant_envoye_cfa = $request->montant_envoye_depart * $request->taux;
        $transfert->montant_envoye_cfa = $montant_envoye_cfa;

        // Calcul des frais d'envoi en fonction du montant envoyé au départ
        if ($request->montant_envoye_depart >= 1 && $request->montant_envoye_depart <= 200) {
            $transfert->frais_envoie = 5;
        } elseif ($request->montant_envoye_depart >= 201 && $request->montant_envoye_depart <= 500) {
            $transfert->frais_envoie = 10;
        } elseif ($request->montant_envoye_depart >= 501 && $request->montant_envoye_depart <= 1000) {
            $transfert->frais_envoie = 15;
        } else {
            $transfert->frais_envoie = 20;
        }

        // Calcul du montant récupéré
        $montant_recupere = $montant_envoye_cfa - ($transfert->frais_envoie * 600);
        $transfert->montant_recupere = $montant_recupere;

        $transfert->save();

        return redirect()->route('transfert.index')->with('status', 'Une nouvelle transaction a été ajoutée avec succès.');
    }

    // Les autres méthodes restent inchangées...
    
    public function show($id)
    {
        return view('Transfert.details', [
            'transfert' => Transfert::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transfert = Transfert::find($id);
        return view('Transfert.modifier', compact('transfert'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transfert = Transfert::find($id);

        $transfert->update([
            'devise' => $request->devise,
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

        return redirect()->route('transfert.index')->with('status', 'Une Transactions  été modifiée avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transfert = Transfert::find($id);
        $transfert->delete();
        return redirect()->route('transfert.index')->with('status', 'Transaction supprimée avec succes.');
    }
}
