<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EntrarController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\UsuariosController;
use App\Mail\ClasseDeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('form_entrar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/clientes', [ClientesController::class, 'index'])
    ->middleware('autenticador')
    ->name('listar_clientes');

Route::get('/clientes/criar', [ClientesController::class, 'create'])
    ->middleware('autenticador')
    ->name('form_novo_cliente');

Route::post('clientes/criar', [ClientesController::class, 'store'])
    ->middleware('autenticador')
    ->name('adicionar_cliente');

Route::post('clientes/remover/{id}', [ClientesController::class, 'destroy'])
    ->middleware('autenticador')
    ->name('excluir_cliente');

Route::get('/clientes/{id}/exibir', [ClientesController::class, 'exibirCliente'])
    ->middleware('autenticador')
    ->name('exibir_cliente');

Route::post('/clientes/{id}/exibir', [ClientesController::class, 'store'])
    ->middleware('autenticador');

Route::get('clientes/{filtro}', [ClientesController::class, 'index'])
    ->middleware('autenticador');

//rota para acessar página de cadastro
Route::get('/cadastro', [CadastroController::class, 'create']);

//rota para cadastrar
Route::post('/cadastro', [CadastroController::class, 'store'])
    ->name('form_novo_usuario');

//rota para página de login
Route::get('/entrar', [EntrarController::class, 'index'])
    ->name('form_entrar');
//rota para realizar login
Route::post('/entrar', [EntrarController::class, 'entrar']);

//rota para sair
Route::get('/sair', function () {
    Auth::logout();

    return redirect()->route('form_entrar');
});

//rota para painel de controle
Route::get('/painel', [PainelController::class, 'index'])
    ->middleware('autenticador')
    ->name('painel_controle');

//rota para exibir cadastro de usuários
Route::get('/usuarios', [UsuariosController::class, 'index'])
    ->middleware('autenticador')
    ->name('lista_usuarios');

//rota para lisatagem com filtros
Route::get('/usuarios/filtro', [UsuariosController::class, 'filtrar'])
    ->middleware('autenticador');

Route::get('/usuarios/inativo', [UsuariosController::class, 'index'])
    ->middleware('autenticador');    

//rota para excluir usuario
Route::post('usuarios/remover/{id}', [UsuariosController::class, 'destroy'])
    ->middleware('autenticador')
    ->name('excluir_usuario');

//rota para exibir usuário
Route::get('/usuarios/{id}/exibir', [UsuariosController::class, 'exibirUsuario'])
->middleware('autenticador');

//rota para exibir usuário
Route::post('/usuarios/{id}/exibir', [CadastroController::class, 'store'])
->middleware('autenticador');

//rota para email
Route::get('/sendmail', function () {

    $user = new stdClass();
    $user->name = 'Nome Genérico';
    $user->email = 'nome@emailgenerico.com';
    //return new ClasseDeEmail($user);
    \Illuminate\Support\Facades\Mail::send(new ClasseDeEmail($user));
});

require __DIR__.'/auth.php';
