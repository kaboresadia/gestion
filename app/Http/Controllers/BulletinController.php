<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulletin;

class BulletinController extends Controller
{
    // Affichage de la liste des bulletins de paie
    public function affichage()
    {
        $bulletins = Bulletin::all();
        return view('bulletins.liste', compact('bulletins'));
    }

    // Affichage du formulaire d'ajout de bulletin de paie
    public function formAjout()
    {
        return view('bulletins.ajout');
    }

    // Traitement de l'ajout de bulletin de paie
    public function traitementAjout(Request $request)
    {
        $request->validate([
            'date_paiement' => 'required|string',
        ]);

        $bulletin = new Bulletin();
        $bulletin->date_paiement = $request->input('date_paiement');
        $bulletin->save();

        return redirect()->route('bulletins.liste')->with('status', 'Le bulletin de paie a bien été ajouté');
    }

    // Affichage du formulaire d'édition de bulletin de paie
    public function edit($id)
    {
        $bulletin = Bulletin::find($id);
        return view('bulletins.modifier', compact('bulletin'));
    }

    // Traitement de la mise à jour de bulletin de paie
    public function traitementUpdate(Request $request)
    {
        $request->validate([
            'date_paiement' => 'required|string',
        ]);

        $bulletin = Bulletin::find($request->id);
        $bulletin->date_paiement = $request->date_paiement;
        $bulletin->update();

        return redirect()->route('bulletins.liste')->with('status', "Le bulletin de paie a bien été modifié");
    }

    // Suppression d'un bulletin de paie
    public function delete($id)
    {
        $bulletin = Bulletin::find($id);

        if (!$bulletin) {
            return redirect()->route('bulletins.liste')->with('error', 'Bulletin de paie non trouvé');
        }

        $bulletin->delete();
        return redirect()->route('bulletins.liste')->with('success', 'Suppression du bulletin de paie réussie');
    }

    // Affichage des détails d'un bulletin de paie
    public function detail($id)
    {
        $bulletin = Bulletin::find($id);

        if (!$bulletin) {
            return redirect()->route('bulletins.liste')->with('error', 'Bulletin de paie non trouvé');
        }

        return view('bulletins.detail', compact('bulletin'));
    }
}
