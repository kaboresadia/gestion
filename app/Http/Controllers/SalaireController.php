<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salaire;

class SalaireController extends Controller
{
    // Affichage de la liste des salaires
    public function affichage()
    {
        $salaires = Salaire::all();
        return view('salaires.liste', compact('salaires'));
    }

    // Affichage du formulaire d'enregistrement
    public function form_register()
    {
        return view('salaires.ajouter');
    }

    // Traitement de l'enregistrement
    public function traitement_register(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:salaires',
            'montant' => 'required|numeric|min:0',
        ]);
    
        Salaire::create([
            'nom' => $request->nom,
            'montant' => $request->montant,
        ]);
    
        return redirect()->route('salaires.liste')->with('status', 'Le salaire a bien été enregistré');
    }

    // Affichage du formulaire d'édition
    public function edit($id)
    {
        $salaire = Salaire::find($id);
        return view('salaires.modifier', compact('salaire'));
    }

    // Traitement de la mise à jour
    public function traitement_update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|unique:salaires,nom,' . $id,
            'montant' => 'required|numeric|min:0',
        ]);
    
        $salaire = Salaire::find($id);
        $salaire->update([
            'nom' => $request->nom,
            'montant' => $request->montant,
        ]);
    
        return redirect()->route('salaires.liste')->with('status', "Le salaire a bien été modifié");
    }

    // Suppression d'un salaire
    public function delete($id)
    {
        $salaire = Salaire::find($id);

        if (!$salaire) {
            return redirect()->route('salaires.liste')->with('error', 'Salaire non trouvé');
        }
        $salaire->delete();
        return redirect()->route('salaires.liste')->with('success', 'Suppression réussie');
    }

    // Affichage des détails d'un salaire
    public function detail($id)
    {
        $salaire = Salaire::find($id);
        if (!$salaire) {
            return redirect()->route('salaires.liste')->with('error', 'Salaire non trouvé');
        }
        return view('salaires.detail', compact('salaire'));
    }
}

