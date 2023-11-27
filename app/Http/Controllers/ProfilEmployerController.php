<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilEmployer;

class ProfilEmployerController extends Controller
{
    public function affichage()
    {
        // Logique pour récupérer et afficher la liste des profilsEmployer
        $profilsEmployer = ProfilEmployer::all();
        return view('ProfilEmployers.liste', compact('profilsEmployer'));
    }

    public function form_register()
    {
        // Afficher le formulaire d'enregistrement
        return view('ProfilEmployers.enregistrement');
    }

    public function traitement_register(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|unique:profil_employer',
        ]);

        // Créer un nouveau profilEmployer
        $profilEmployer = new ProfilEmployer();
        $profilEmployer->nom = $request->input('nom');
        $profilEmployer->save();

        // Rediriger avec un message de succès
        return redirect()->route('profilEmployers.liste')->with('status', 'Votre profilEmployer a bien été créé');
    }

    public function edit($id)
    {
        // Récupérer le profilEmployer pour l'édition
        $profilEmployer = ProfilEmployer::find($id);
        return view('ProfilEmployers.modifier', compact('profilEmployer'));
    }

    public function traitement_update(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'nom' => 'required|unique:profil_employer,nom,' . $request->id,
    ]);

    // Récupérer le profilEmployer pour la mise à jour
    $profilEmployer = ProfilEmployer::find($request->id);

    if (!$profilEmployer) {
        return redirect()->route('profilEmployers.liste')->with('error', 'ProfilEmployer non trouvé');
    }

    // Mise à jour des données du profilEmployer
    $profilEmployer->nom = $request->nom;
    $profilEmployer->save();

    // Redirection avec un message de succès
    return redirect()->route('profilEmployers.liste')->with('status', 'Le profilEmployer a bien été modifié');
}

public function delete($id)
{
    // Récupérer le profilEmployer pour la suppression
    $profilEmployer = ProfilEmployer::find($id);

    if (!$profilEmployer) {
        return redirect()->route('profilEmployers.liste')->with('error', 'ProfilEmployer non trouvé');
    }

    // Suppression du profilEmployer
    $profilEmployer->delete();

    // Redirection avec un message de succès
    return redirect()->route('profilEmployers.liste')->with('success', 'Le profilEmployer a bien été supprimé');
}

}

