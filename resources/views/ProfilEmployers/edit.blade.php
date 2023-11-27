<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Formulaire d'édition</title>
</head>

<body>

    <div class="container form text-white">

        <form action="{{ route('postes.update') }}" method="POST">
            @csrf

            <input type="text" name="id" style="display: none;" value="{{ $poste->id }}">
            <div class="mb-3">
                <label for="exampleInputNom" class="form-label">Nom du Poste</label>
                <input type="text" name="nom" class="form-control" id="exampleInputNom" aria-describedby="emailHelp" placeholder="Saisir le nom du département" value="{{ $poste->nom }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputNom" class="form-label">Description du Poste</label>
                <input type="text" name="nom" class="form-control" id="exampleInputNom" aria-describedby="emailHelp" placeholder="Saisir le nom du département" value="{{ $poste->nom }}" required>
            </div>
            <div class="col-md-12 text-center">
                <button class="button" type="submit" name="submit" class="btn-primary">Enregistrer</button>
            </div>

        </form>

    </div>
    <script src="{{asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/script.js') }}"></script>
</body>
</html>
