<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<div class="container-fluid s0 text-white">
    <div class="row">
      <div class="col-md-2 col-sm-2 s3">
        <img src="{{ asset('image/image2.png') }}" alt="logo" width="110px" height="120px">
      </div>
      <div class="col-md-8 col-sm-8 s2">
        <h2 class="a2 text-white">Bienvenue sur votre application de gestion de la paie</h2>
      </div>
      <div class="col-md-2 col-sm-2 s4">
        <h3 class="b1 text-white">Burkina-Faso</h3>
        <h5 class="b2">Unité-Progrès-justice</h5>
      </div>
    </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-lg-2 bg-dark sidebar">
      <!-- Barre latérale -->
      <br>
      <br>
      <h4 class="text-light">Tableau de bord</h4><hr>
      
      <br><ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('departements.formulaire') }}">
            <ion-icon name="copy-outline" style="font-size: 30px;vertical-align: middle;"></ion-icon>Departement
        </a>
    </li>
    <br>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('postes.accueil') }}">
            <ion-icon name="clipboard-outline" style="font-size: 30px;vertical-align: middle;"></ion-icon>Poste
        </a>
    </li>
    <br>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('profilEmployers.formulaire') }}">
            <ion-icon name="apps-outline" style="font-size: 30px;vertical-align: middle;"></ion-icon>ProfilEmployeur
        </a>
    </li>
    <br>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('salaires.ajouter') }}">
            <ion-icon name="calculator-outline" style="font-size: 30px;vertical-align: middle;"></ion-icon>Salaire
        </a>
    </li>
    <br>
    <li class="nav-item">
        <a class="nav-link text-light" href="/acceuil">
            <ion-icon name="people-outline" style="font-size: 30px; vertical-align: middle;"></ion-icon>Employeur
        </a>
    </li>
    <br>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('bulletins.ajout') }}">
            <ion-icon name="newspaper-outline" style="font-size: 30px;vertical-align: middle;"></ion-icon>Bulletin de paie
        </a>
    </li>
    
    @auth
        <form class="deconnection" action="{{ route('logout') }}" method="POST">
            @csrf
            <ion-icon name="log-out-outline"style="font-size: 30px;vertical-align: middle;"></ion-icon><button type="submit">Déconnexion</button>
        </form>
    @endauth
</ul>
    </div>
    <div class="col-md col-lg-10 content">
      <img src="{{ asset('image/image1.jpg') }}" alt="logo" width="100%" height="auto">
      @yield('page-content')
    </div>
  </div>
</div>
<div class="container-fluid footer text-center mt-3">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <p class="text-white">&copy;Copyright 2023.Tous droit Réservées</p>
    </div>
  </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
</x-app-layout>
