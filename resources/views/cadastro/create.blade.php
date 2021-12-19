@extends('layout')

@section('titulo')
    Cadastrar
@endsection

@section('cabecalho')
    <h1>Realizar cadastro</h1>
@endsection

@section('conteudo')
<div class="card">
  <div class="card-header" style="background-color: #343a40; color: white;">
    <h2>Requisitos de cadastro</h2>
  </div>
  <div class="card-body">
    <h5 class="card-title">Para que o cadastro seja válido siga esses passos:</h5>
    <p class="card-text">
        <ul>
            <li>Nome: Pelo menos 5 caracteres ou sobrenome</li>
            <li>Telefone: Insira apenas os números</li>
            <li>Senha - Precisa ter:
                <ul>
                    <li>Pelo menos 8 caracteres</li>
                    <li>Pelo menos 1 letra maiúscula</li>
                    <li>Pelo menos 1 letra minúscula</li>
                    <li>Pelo menos 1 caractere especial</li>
                </ul>
            </li>
        </ul>
    </p>
  </div>
</div>


<form method="post">
@csrf
    <section class="vh-70 mt-4">
    <div class="container">
        <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0">Preencha os dados para cadastrar</h3>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form>
                <div class="row">
                <div class="col-md-6 mb-1">
                    <fieldset class="mb-3">
                        <legend class="col-form-label">Responsabilidade</legend>
                        <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="responsibility" id="cargoUser" value="user" checked>
                            <label class="form-check-label" for="cargoUser">
                            Usuário
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="responsibility" id="cargoAdmin" value="admin">
                            <label class="form-check-label" for="cargoAdmin">
                            Administrador
                            </label>
                        </div>
                        </div>
                    </fieldset>
                </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">

                    <div class="form-outline">
                        <label class="form-label" for="mane">Nome</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control form-control"
                            value="{{isset($user) ? $user->name : ''}}" />
                    </div>

                    </div>
                    <div class="col-md-6 mb-4">

                    <div class="form-outline">
                        <label class="form-label" for="email">E-mail</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-control form-control"
                            value="{{isset($user) ? $user->email : ''}}"/>
                    </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 d-flex align-items-center">
                    <div class="form-outline w-100">
                        <label for="phone" class="form-label">Telefone</label>
                        <input 
                            type="text" 
                            name="phone" 
                            class="form-control form-control" 
                            id="phone"
                            value="{{isset($user) ? $user->phone : ''}}"/>
                    </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label select-label" for="sex">Sexo:</label>
                        <select id="sex" name="sex" class="form-control">
                            <option selected>{{isset($user) ? $user->sex : ''}}</option>
                            <option>Feminino</option>
                            <option>Masculino</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
                        <label class="form-label select-label" for="state">{{isset($user) ? "Estado - {$user->state}" : 'Selecione seu Estado'}}</label>
                        <select id="estado" name="state" class="form-control" aria-label="Default select example">
                            <optgroup>
                                
                            </optgroup>
                        </select>
                    </div>

                    <div class="col-md-6 mb-4 pb-2">
                        <label class="form-label select-label" for="city">{{isset($user) ? "Cidade - {$user->city}" : 'Selecione sua cidade'}}</label>
                        <select id="cidade" name="city" class="form-control">
                            <optgroup></optgroup>
                        </select>
                    </div>
                </div>    

                <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
                        <label class="form-label select-label" for="situation">Situação</label>
                        <select id="situation" name="situation" class="form-control">
                            <option  selected>{{isset($user) ? $user->situation : ''}}</option>
                            <option >Ativo</option>
                            <option >Inativo</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                        <label class="form-label" for="password">Senha</label>
                        <input type="password" name="password" id="password" class="form-control form-control" />
                    </div>
                    
                    </div>
                </div>

                <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>

                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</form>    

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  
<script src="{{asset('js/localidades.js')}}"></script>
@endsection