<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;

class DepartementController extends Controller
{

    // Pour afficher
    public function affichage()
    {
        $departements = Departement::all();
        return view('departements.liste', compact('departements'));
    }

    // Pour page accueil
    public function form_register()
    {
        return view('departements.enregistrements');
    }

    // Pour enregistrer
    public function traitement_register(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:departements',
        ]);
    
        $departement = new Departement();
        $departement->nom = $request->input('nom');
        $departement->save();
    
        return redirect()->route('departements.liste')->with('status', 'Votre département a bien été créé');
    }

    // Pour page éditer
    public function edit($id)
    {
        $departement = Departement::find($id);
        return view('departements.modifier', compact('departement'));
    }

    // Pour actualiser
    public function traitement_update(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:departements,nom,' . $request->id,
        ]);
    
        $departement = Departement::find($request->id);
        $departement->nom = $request->nom;
        $departement->update();
    
        return redirect('/liste')->with('status', "Le département a bien été modifié");
    }

    // Pour supprimer
    public function delete($id)
    {
        $departement = Departement::find($id);

        if (!$departement) {
            return redirect()->route('departements.liste')->with('error', 'Département non trouvé');
        }
        $departement->delete();
        return redirect()->route('departements.liste')->with('success', 'Suppression réussie');
    }

    // Pour détail
    public function detail($id)
    {
        $departement = Departement::find($id);
        if (!$departement) {
            return redirect()->route('liste')->with('error', 'Département non trouvé');
        }
        return view('departements.detail', compact('departement'));
    }
}