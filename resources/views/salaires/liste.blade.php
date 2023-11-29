<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Liste des Salaires</title>
</head>

<body>
    @if (session('status'))
    <div class="alert  alert-dismissible fade show alert-success" id="alert" role="alert">
        <strong>Bravo!</strong> {{ session('status') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a class="btn btn-info" href="{{ route('salaires.ajouter') }}">Ajouter un salaire</a>
    <div class="container tableau">
        <table class="table table-striped table-bordered pad text-center tableau">
            <thead class="table-info">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nom du Salaire</th>
                    <th scope="col">Montant</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp

                @foreach($salaires as $salaire)

                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $salaire->nom }}</td>
                    <td>{{ $salaire->montant }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('salaires.modifier', $salaire->id) }}">Modifier</a>
                    </td>
                    <td>
                        <a class="btn btn-dark" href="{{ route('salaires.detail', $salaire->id) }}">Détails</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick='return confirm("Voulez-vous vraiment supprimer ce salaire")' href="{{ route('salaires.supprimer', $salaire->id) }}">Supprimer</a>
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
