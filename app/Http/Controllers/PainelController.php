<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PainelController extends Controller
{
    public function index()
    {
        $numeroDeClientes = Cliente::query();

        $clientesInativos = Cliente::query()->where('situacao', '=', 'inativo');

        $origem = [
            "facebook" => Cliente::query()->where('origem', '=', 'Facebook'),
            "site" => Cliente::query()->where('origem', '=', 'Site'),
            "indicacao" => Cliente::query()->where('origem', '=', 'Indicação'),
            "bocaboca" => Cliente::query()->where('origem', '=', 'Boca a Boca'),
        ];

        $usuariosInativos = User::query()->where('situation', '=', 'Inativo');

        if(!Gate::allows('is_admin')) {

            return view('painel.index', [
                "numeroDeClientes" => $numeroDeClientes,
                "clientesInativos" => $clientesInativos,
                "origem" => $origem,
            ]);
        }
        
        $numeroDeUsuarios = User::query();

        return view('painel.index', compact('numeroDeUsuarios', 'numeroDeClientes', 'usuariosInativos', 'clientesInativos', 'origem'));
    }
}
