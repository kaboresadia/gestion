<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Formulaire d'inscription</title>
</head>

<body>
    @if (session('status'))
    <!-- if (isset($_GET['succes'])) { -->
    <div class="alert  alert-dismissible fade show alert-success" id="alert" role="alert">
        <strong>Bravo!</strong> {{session('status')}}.
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    @endif

    <a class="btn btn-info" href="{{route('acceuil')}}">Ajouter un etudiant</a>
    <div class="container tableau">
        <table class="table table-striped table-bordered pad text-center tableau">
            <thead class="table-info">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">NOM</th>
                    <th scope="col">PRENOM</th>
                    <th scope="col">Email</th>
                    <th scope="col">Numéro de téléphone</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp

                @foreach($clients as $clients)


                <tr>
                    <td>{{ $i }}</td>
                    <td>{{$clients->nom}}</td>
                    <td>{{$clients->prenom}}</td>
                    <td>{{$clients->email}}</td>
                    <td>{{$clients->numero}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('modifier',$clients->id)}}">Modifier</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick='return confirm("Voulez-vous vraiment supprimer cet étudiant")' href="{{route('supprimer',$clients->id)}}">Supprimer</a>
                    </td>
                    <td>
                        <a class="btn btn-dark" href="{{route('detail',$clients->id)}}">Details</a>
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