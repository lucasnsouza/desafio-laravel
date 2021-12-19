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
    <nav class="nav d-flex justify-content-between p-2" style="background-color: #343a40;">
        <div class="d-flex row ml-1">
            <span class="navbar-brand mb-0 p-1 h1" style="background-color: white; border-radius: 2px;">{{Auth::user()->name}}</span>
            <a class="nav-link active" style="color: white;" href="/painel">Início</a>
            @can('is_admin')
            <a class="nav-link active" style="color: white;" href="/usuarios">Usuários</a>
            @endcan
            <a class="nav-link active" style="color: white;" href="/clientes">Clientes</a>
        </div>
        <a class="nav-link" style="color: white;" href="/sair">Sair</a>
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
</html>