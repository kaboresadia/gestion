<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Détail du Poste</title>
</head>

<body>
    <div class="container form2 text-white">
        <h2 class="s text-white">Détail d'un Poste</h2><br>

        <h3>Nom du poste : {{ $poste->nom }}</h3>
        <h3>Description du poste: {{ $poste->nom }}</h3>
    </div>
    <script src="{{asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/script.js') }}"></script>
</body>

</html>
