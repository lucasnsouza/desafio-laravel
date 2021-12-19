@extends('layout')

@section('titulo')
    Entrar
@endsection

@section('conteudo')

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">
            <form method="post">
                @csrf
                <h3 class="mb-4">Iniciar sessão</h3>
                @include('erros', ['errors' => $errors])
                <div class="form-outline mb-3">
                <input type="email" name="email" id="email" class="form-control form-control-lg" />
                <label class="form-label" for="email">E-mail</label>
                </div>

                <div class="form-outline mb-3">
                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                <label class="form-label" for="password">Senha</label>
                </div>

                <h6 class="mb-3">Esqueceu a senha? <a href="/forgot-password">Clique para recuperar.</a></h6>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
            </form>

            <hr class="my-4">

            <h6 class="mb-1">Ainda não tem uma conta? <a href="cadastro">Fazer cadastro.</a></h6>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection