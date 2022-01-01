<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {   
        if(str_contains($request->url(), 'inativo')) {
            $users = User::query()->where('situation', '=', 'Inativo')->paginate(8);
        } else {
            $users = User::query()->paginate(8);
        }
        
        return view('usuarios.index', compact('users'));
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        $request->session()->flash(
            'mensagem',
            "O usuário {$user->name} foi removido com sucesso."
        );

        return redirect()->route('lista_usuarios');
    }

    public function exibirUsuario(Request $request)
    {
        $user = User::find($request->id);

        return view('cadastro.create', compact('user'));
    }

    public function filtrar(Request $request)
    {
        $filtro = $request->filtro;
        $coluna = $request->buscador;
        if ($filtro === 'all') {
            $users = User::query()->paginate(8);
        } else {
            $users = User::where($filtro, "LIKE", '%' . $coluna . '%')->paginate(5);
        }
        
        return view('usuarios.index', compact('filtro', 'coluna', 'users'));
    }

}
