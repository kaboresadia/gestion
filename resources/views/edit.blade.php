<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Formulaire</title>
</head>

<body>
   
    <div class="container form text-white">
      

        <form  action="/updade/traitement" method="POST">
            @csrf

            <input type="text" name="id" style="display: none;" value="{{ $clients->id }}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Saisir votre nom" value="{{ $clients->nom }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Saisir votre prenom" value="{{ $clients->prenom }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Saisir votre email" value="{{ $clients->email }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Numéro de téléphone</label>
                <input type="int" name="numero" class="form-control" id="exampleInputPassword1" placeholder="Saisir votre numéro de téléphone" value="{{ $clients->numero }}" required>
            </div>
            <div class="col-md-12 text-center">
                <button class="button" type="submit" name="submit" class="btn-primary">Envoyer</button>
            </div>

        </form>

    </div>
    <script src="{{asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/script.js') }}"></script>
</body>
</html>