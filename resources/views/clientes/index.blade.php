@extends('layout')

@section('titulo')
    Lista de Clientes
@endsection

@section('cabecalho')
    <h1>Meus clientes</h1>

    <a class="btn btn-dark mb-2" href=" {{ route('form_novo_cliente') }} ">Adicionar cliente</a>
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{$mensagem}} 
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
            <th scope="col">Situação</th>
            <th scope="col">Estado</th>
            <th scope="col">Cidade</th>
            <th scope="col"></th>
            </tr>
        </thead>
        @foreach($clientes as $cliente)
        <tbody>
            <tr>
            <th scope="row">{{$cliente->nome}}</th>
            <td>{{$cliente->telefone}}</td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->situacao}}</td>
            <td>{{$cliente->estado}}</td>
            <td>{{$cliente->cidade}}</td>
            <td class="d-flex">
                <a href="/clientes/{{$cliente->id}}/exibir" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>

                <form method="post" action="/clientes/remover/{{$cliente->id}}"
                    onsubmit="return confirm('Tem certeza que deseja remover o cliente {{addslashes($cliente->nome)}}?')">
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
        {{$clientes->links()}}
    </div>
@endsection