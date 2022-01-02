@extends('layout')

@section('titulo')
    Lista de Usuários
@endsection

@section('cabecalho')
    <h1>Usuários cadastrados</h1>

    <a class="btn btn-dark mb-2" href=" {{ route('form_novo_usuario') }} ">Adicionar usuário</a>
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{$mensagem}} 
        </div>
    @endif

    <form class="form-inline" action="/usuarios/filtro" method="GET">
        <div class="input-group mb-2">
            <select class="custom-select" id="filtro" name="filtro">
                <option selected value="all">Fitros</option>
                <option value="name">Nome</option>
                <option value="state">Estado</option>
                <option value="city">Cidade</option>
                <option value="situation">Situação</option>
            </select>
        </div>    

        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <input type="search" name="buscador" id="buscador" class="form-control" placeholder="Buscar"/>
            </div>
            <button type="submit" class="btn" style="background-color: #343A40; color: white;">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
            <th scope="col">Estado</th>
            <th scope="col">Cidade</th>
            <th scope="col">Situação</th>
            <th scope="col"></th>
            </tr>
        </thead>
        @foreach($users as $user)
        <tbody>
            <tr>
            <th scope="row">{{$user->name}}</th>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->state}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->situation}}</td>
            <td class="d-flex">
                <a href="/usuarios/{{$user->id}}/exibir" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>

                <form method="post" action="/usuarios/remover/{{$user->id}}"
                    onsubmit="return confirm('Tem certeza que deseja remover o cliente {{addslashes($user->name)}}?')">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                </form>
            </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
    {{$users->appends(["filtro" => isset($filtro) ? $filtro : " ", "coluna" => isset($coluna)? $coluna : " "])->links()}}
    </div>
@endsection