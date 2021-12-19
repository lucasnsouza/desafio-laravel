@extends('layout')

@section('titulo')
    Painel de controle
@endsection

@section('cabecalho')
    <h1>Painel de controle</h1>
@endsection

@section('conteudo')
@can('is_admin')
<div class="card-group border">
  <div class="col">
    <div class="card border-info m-3" style="max-width: 18rem;">
        <div class="card-header">Usuários cadastrados</div>
        <div class="card-body">
            <h3 class="card-title d-flex justify-content-around">{{$numeroDeUsuarios->count()}}
            <a href="/usuarios" style="color: #212529;"><i class="fas fa-users"></i></a>
            </h3>
            <p class="card-text">Gerencie todos usuários com opções de edição e exclusão.</p>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-success m-3" style="max-width: 18rem;">
        <div class="card-header">Adicionar</div>
        <div class="card-body">
            <h3 class="card-title d-flex justify-content-around">Novo
            <a href="/cadastro" style="color: #212529;"><i class="fas fa-user-plus"></i></a>
            </h3>
            <p class="card-text">Clique para adicionar um novo usuário.</p>
        </div>
    </div>
  </div>  
  
  <div class="col">
    <div class="card border-danger m-3" style="max-width: 18rem;">
        <div class="card-header">Usuários inativos</div>
        <div class="card-body">
            <h3 class="card-title d-flex justify-content-around">{{$usuariosInativos->count()}}
            <a href="/usuarios/inativo" style="color: #212529;"><i class="fas fa-user-times"></i></i></a>
            </h3>
            <p class="card-text">Veja uma lista com os usuários inativos.</p>
    </div>
  </div>
</div>
@endcan
<div class="card-group border">
  <div class="col">
    <div class="card text-white bg-info m-3" style="max-width: 18rem;">
        <div class="card-header">Clientes cadastrados</div>
        <div class="card-body">
            <h3 class="card-title d-flex justify-content-around">{{$numeroDeClientes->count()}}
            <a href="/clientes" style="color: white;"><i class="fas fa-external-link-alt"></i></a>
            </h3>
            <p class="card-text">Gerenciar os clientes cadastrados.</p>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-white bg-secondary m-3" style="max-width: 18rem;">
        <div class="card-header">Adicionar novo cliente</div>
        <div class="card-body">
          <h3 class="card-title d-flex justify-content-around">Novo
            <a href="/clientes/criar" style="color: white;"><i class="fas fa-external-link-alt"></i></a>
            </h3>
            <p class="card-text">Clique para adicionar diratamente.</p>
        </div>
    </div>
  </div>  
  <div class="col">
    <div class="card text-white bg-success m-3" style="max-width: 18rem;">
        <div class="card-header">Origem</div>
        <div class="card-body">
          <p class="card-text m-0">Site - {{$origem['site']->count()}}
          <a href="/clientes/site" style="color: white;"><i class="fas fa-external-link-alt"></i></a>
          </p>
          <p class="card-text m-0">Facebook - {{$origem['facebook']->count()}}
          <a href="/clientes/facebook" style="color: white;"><i class="fas fa-external-link-alt"></i></a>
          </p>
          <p class="card-text m-0">Indicação - {{$origem['indicacao']->count()}}
          <a href="/clientes/idicacao" style="color: white;"><i class="fas fa-external-link-alt"></i></a>
          </p>
          <p class="card-text m-0">Boca a boca - {{$origem['bocaboca']->count()}}
          <a href="/clientes/boca" style="color: white;"><i class="fas fa-external-link-alt"></i></a>
          </p>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-white bg-danger m-3" style="max-width: 18rem;">
        <div class="card-header">Clientes inativos</div>
        <div class="card-body">
            <h3 class="card-title d-flex justify-content-around">{{$clientesInativos->count()}}
            <a href="/clientes/inativo" style="color: white;"><i class="fas fa-external-link-alt"></i></a>
            </h3>
            <p class="card-text">Veja uma lista dos clientes inativos.</p>
    </div>
  </div>
</div>
@endsection