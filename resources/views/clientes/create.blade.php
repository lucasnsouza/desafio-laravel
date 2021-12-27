@extends('layout')

@section('titulo')
    Novo cliente
@endsection



@section('cabecalho')
    <h1>Adicionar cliente</h1>
@endsection

@section('conteudo')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="exemplo">

    </div>
    <form method="post">
        @csrf
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input
                    type="text"
                    class="form-control"
                    name="nome"
                    placeholder="Nome"
                    value="{{isset($cliente) ? $cliente->nome : ''}}">
        </div>
        <div class="form-group col-md-6">
            <label for="telefone">Telefone - Insira apenas os números com DDD</label>
            <input
                    type="text"
                    class="form-control telefone"
                    name="telefone"
                    placeholder="Telefone - Apenas os números"
                    value="{{isset($cliente) ? $cliente->telefone : ''}}">
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="E-mail"
                        value="{{isset($cliente) ? $cliente->email : ''}}">
            </div>
            <div class="form-group col-md-6">
                <label for="cnpj">CNPJ - Insira apenas os números</label>
                <input
                        type="text"
                        class="form-control cnpj"
                        name="cnpj"
                        placeholder="CNPJ - Apenas os números"
                        value="{{isset($cliente) ? $cliente->cnpj : ''}}">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="estado">Estado - {{isset($cliente) ? $cliente->estado : 'Escolha seu Estado.'}}</label>
                <select name="estado" id="estado" class="form-control"">
                    <optgroup>
                        
                    </optgroup>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="cidade">Cidade - {{isset($cliente) ? $cliente->cidade : 'Escolha uma cidade'}}</label>
                <select name="cidade" id="cidade" class="form-control" aria-label="Default select example">
                    <optgroup>
                    
                    </optgroup>
                </select>
            </div>

            <div class="form-group col-md-2">
                <label for="situacao">Situação</label>
                <select
                        type="text"
                        class="form-control"
                        name="situacao">
                    <option selected>{{isset($cliente) ? $cliente->situacao : ''}}</option>
                    <option>Ativo</option>
                    <option>Inativo</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="origem">Origem</label>
                <select
                        type="text"
                        class="form-control"
                        name="origem">
                    <option selected>{{isset($cliente) ? $cliente->origem : ''}}</option>
                    <option>Site</option>
                    <option>Boca a boca</option>
                    <option>Facebook</option>
                    <option>Indicação</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
@endsection

@section("script")
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
    integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
<script src="{{asset('js/localidades.js')}}"></script>
<script>
    $(document).ready(function($) {
        $('.telefone').mask('(00)00000-0000');
    });

    $(document).ready(function($) {
        $('.cnpj').mask('00.000.000/0000-00');
    });
</script>
@endsection