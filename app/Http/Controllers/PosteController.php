<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poste;

class PosteController extends Controller
{

    // Afficher la liste des postes
    public function affichage()
    {
        $postes = Poste::all();
        return view('postes.liste', compact('postes'));
    }

    // Pour la page d'accueil des postes
    public function form_register()
    {
        return view('postes.accueil');
    }

    // Enregistrer un nouveau poste
    public function traitement_register(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:postes',
            'description' => 'required',
        ]);

        $poste = new Poste();
        $poste->nom = $request->input('nom');
        $poste->description = $request->input('description');
        $poste->save();

        return redirect()->route('postes.liste')->with('status', 'Le poste a bien été créé');
    }

    // Pour la page d'édition des postes
    public function edit($id)
    {
        $poste = Poste::find($id);
        return view('postes.edit', compact('poste'));
    }

    // Actualiser un poste
    public function traitement_update(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:postes,nom,' . $request->id,
            'description' => 'required',
        ]);

        $poste = Poste::find($request->id);

        if (!$poste) {
            return redirect('postes.liste')->with('error', 'Poste non trouvé');
        }

        $poste->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect('postes.liste')->with('status', 'Le poste a bien été modifié');
    }

    // Supprimer un poste
    public function delete($id)
    {
        $poste = Poste::find($id);

        if (!$poste) {
            return redirect('postes.liste')->with('error', 'Poste non trouvé');
        }

        $poste->delete();
        return redirect('postes.liste')->with('success', 'Le poste a bien été supprimé');
    }

    // Afficher les détails d'un poste
    public function detail($id)
    {
        $poste = Poste::find($id);

        if (!$poste) {
            return redirect('postes.liste')->with('error', 'Poste non trouvé');
        }

        return view('postes.detail', compact('poste'));
    }
}
