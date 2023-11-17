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
      <h2 class="text-light">Dashboard</h2>
      <br>
      <br>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="/acceuil">Gestion des employers </a>
        </li>
        <br>
        <li class="nav-item">
          <a class="nav-link text-light" href="/liste">Calcule des salaires</a>
        </li>
        <br>
        <li class="nav-item">
          <a class="nav-link text-light" href="/liste">Bulletin de paie</a>
        </li>
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
</body>
</html>
</x-app-layout>
