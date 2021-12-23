<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    @yield('scripts')
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-brand mb-0 p-1 h1" style="color:#343a40; background-color: white; border-radius: 2px;">
    {{Auth::user()->name}}
    </span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-link active">
            <a class="nav-link" href="/painel">Início</a>
        </li>
        @can('is_admin')
        <li class="nav-link active">
            <a class="nav-link" href="/usuarios">Usuários</a>
        </li>
        @endcan
        <li class="nav-link active">
            <a class="nav-link" href="/clientes">Clientes</a>
        </li>
        </ul>

        <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0">
            <a class="nav-link active" style="color: white;" href="/sair">Sair</a>
        </button>
    </div>
    </nav>
    @endauth

    @auth
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between">
            @yield('cabecalho')
        </div>
    </div>
    @endauth

    <div class="container-sm">
        @yield('conteudo')
    </div>   
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</html>