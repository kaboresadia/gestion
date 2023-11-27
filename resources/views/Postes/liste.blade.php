<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Liste des postes</title>
</head>

<body>
    @if (session('status'))
    <div class="alert  alert-dismissible fade show alert-success" id="alert" role="alert">
        <strong>Bravo!</strong> {{ session('status') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a class="btn btn-info" href="{{ route('postes.accueil') }}">Ajouter un poste</a>

<div class="container tableau">
    <table class="table table-striped table-bordered pad text-center tableau">
        <thead class="table-info">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach($postes as $poste)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $poste->nom }}</td>
        <td>{{ $poste->description }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('postes.traitement_update', $poste->id) }}">Modifier</a>
        </td>
        <td>
            <a class="btn btn-dark" href="{{ route('postes.detail', $poste->id) }}">Détails</a>
        </td>
        <td>
            <a class="btn btn-danger" onclick='return confirm("Voulez-vous vraiment supprimer ce poste")' href="{{ route('postes.supprimer', $poste->id) }}">Supprimer</a>
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
</div>
