<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Liste des Départements</title>
</head>

<body>
    @if (session('status'))
    <div class="alert  alert-dismissible fade show alert-success" id="alert" role="alert">
        <strong>Bravo!</strong> {{ session('status') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a class="btn btn-info" href="{{ route('departements.formulaire') }}">Ajouter un département</a>
    <div class="container tableau">
        <table class="table table-striped table-bordered pad text-center tableau">
            <thead class="table-info">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nom du Département</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp

                @foreach($departements as $departement)

                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $departement->nom }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('departements.modifier', $departement->id) }}">Modifier</a>
                    </td>
                    <td>
                        <a class="btn btn-dark" href="{{ route('departements.detail', $departement->id) }}">Détails</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick='return confirm("Voulez-vous vraiment supprimer ce département")' href="{{ route('departements.supprimer', $departement->id) }}">Supprimer</a>
                    </td>
                </tr>

                @php
                $i++;
                @endphp

                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
