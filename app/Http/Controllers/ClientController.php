<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    //Pour afficher
    public function affissage()
    {
        $clients = Client::all();
        return view('liste', compact('clients'));
    }


    //Pour page accueil
    public function form_register()
    {
        return view('accueil');
    }

    //Pour enregister
    public function traitement_register(Request $Request)
    {
        $Request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'email|required|unique:clients',
            'numero' => 'required|min:8',
        ]);
        $client = new Client();
        $client->nom = $Request->input('nom');
        $client->prenom = $Request->input('prenom');
        $client->email = $Request->input('email');
        $client->numero = $Request->input('numero');
        $client->save();

        return redirect('/liste')->with('status', 'votre compte a bien été créer');
    }

    //Pour page editer
    public function edit($id)
    {
        $clients = Client::find($id);
        return view('edit', compact('clients'));
    }

    //Pour actualiser
    public function traitement_update(Request $Request)
    {
        $Request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'email|required',
            'numero' => 'required|min:8',
        ]);
        $client = Client::find($Request->id);
        $client->nom = $Request->nom;
        $client->prenom = $Request->prenom;
        $client->email = $Request->email;
        $client->numero = $Request->numero;
        $client->update();

        return redirect('/liste')->with('status', "L'Etudiant a bien été modifier");
    }

    //Pour supprimer
    public function delete($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return redirect()->route('tableau')->with('error', 'utilisateur non trouvé');
        }
        $client->delete();
        return redirect()->route('tableau')->with('success', 'suppression réussie');
    }
    //Pour detail
    public function detail($id)
    {
        $clients = Client::find($id);
        if (!$clients) {
            return redirect()->route('liste')->with('error', 'utilisateur non trouvé');
        }
        return view('detail', compact('clients'));
    }
}
