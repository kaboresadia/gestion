
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

<div class="container-fluid s0 text-white">
    <div class="row">
      <div class="col-md-2 col-sm-2 s3">
        <img src="{{ asset('image/image2.png') }}" alt="logo" width="110px" height="120px">
      </div>
      <div class="col-md-8 col-sm-8 s2">
        <h3 class="a2 text-white">Bienvenue sur votre application de gestion de la paie</h3>
      </div>
      <div class="col-md-2 col-sm-2 s4">
        <h3 class="b1 text-white">Burkina-Faso</h3>
        <h5 class="b2">Unité-Progrès-justice</h5>
      </div>
    </div>
</div>

<div class="container mt-3 ">
    <div class="row"> 
        <div class="col-md-6  text-white rounded">
           <form action='/register/traitement' method="POST">
            <h2 class="inscrit text-white">Veuillez inscrire un employé</h2><hr>
            @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
                 </div>
                 <div class="mb-3">
                     <label for="exampleInputPassword1" class="form-label">Email</label>
                     <input type="email" name="email" class="form-control" id="exampleInputPassword1" required>
                </div>

               <div class="mb-3">
                   <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                   <input type="mot_pass" name="mot_pass" class="form-control" id="exampleInputPassword1"  required>
               </div>
            @error('email')
            <p class="text-danger">Cet email existe déja </p>
            @enderror('email')
               <div class="mb-3">
                   <label for="exampleInputPassword1" class="form-label">Numéro de téléphone</label>
                   <input type="int" name="numero" class="form-control" id="exampleInputPassword1"  required>
              </div>
            @error('numero')
            <p class="text-danger">Veillez saisir obligatoirement 8 chiffres </p>
            @enderror('numero')
                <div class="col-md-12 text-center">
                    <button class="button" type="submit" name="submit" class="btn-primary">Enregistrer</button>
                </div>
             </form>
     </div>
           <div class="col-md-6">
               <img class="ima"src="{{ asset('../image/image2.jpg') }}" alt="" heigth="200" width="600">
          </div>
    </div>
</div>
    <div class="container-fluid footer  mt-3">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <p class="text-white">&copy;Copyright 2023.Tous droit Réservées</p>
      </div>
    </div>
  </div>

  <script src="{{asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/script.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>