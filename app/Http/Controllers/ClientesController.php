<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesFormRequest;
use App\Models\Cliente;
use App\Services\CriadorDeCliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(Request $request)
    {   
        if(str_contains($request->url(), 'inativo')) {
            $clientes = Cliente::query()
                ->where('situacao', '=', 'Inativo')
                ->paginate(6);
        } elseif (str_contains($request->url(), 'site')) {
            $clientes = Cliente::query()
                ->where('origem', '=', 'Site')
                ->paginate(6);
        } elseif (str_contains($request->url(), 'facebook')) {
            $clientes = Cliente::query()
                ->where('origem', '=', 'Facebook')
                ->paginate(6);
        }elseif (str_contains($request->url(), 'boca')) {
            $clientes = Cliente::query()
                ->where('origem', '=', 'Boca a Boca')
                ->paginate(6);
        }elseif (str_contains($request->url(), 'indicacao')) {
            $clientes = Cliente::query()
                ->where('origem', '=', 'Indicação')
                ->paginate(6);
        }else {
            $clientes = Cliente::query()
                ->orderBy('nome', 'asc')
                ->paginate(6);
        }            

        //pegar mensagem de sessão difinida ao adionar cliente com sucesso
        $mensagem = $request->session()->get('mensagem');
        //remove sessão depois de exibir
        $request->session()->remove('mensagem');

        return view('clientes.index', compact('clientes', 'mensagem'));
    }

    public function create()
    {   
        return view('clientes.create');
    }

    public function store(ClientesFormRequest $request, CriadorDeCliente $criadorDeCliente)
    {
        $cliente = $criadorDeCliente->criarCliente(
            $request,
            $request->nome,
            $request->telefone,
            $request->cnpj,
            $request->email,
            $request->origem,
            $request->cidade,
            $request->estado,
            $request->situacao,
        );

        $request->session()->flash(
            'mensagem',
            "Novo cliente adicionado com sucesso: {$cliente->nome}."
        );

        return redirect()->route('listar_clientes');
    }

    public function destroy(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->delete();

        $request->session()->flash(
            'mensagem',
            "Cliente {$cliente->nome} excluído com sucesso."
        );

        return redirect()->route('listar_clientes');
    }

    public function exibirCliente(Request $request)
    {
        $cliente = Cliente::find($request->id);

        return view('clientes.create', compact('cliente'));
    }
}
