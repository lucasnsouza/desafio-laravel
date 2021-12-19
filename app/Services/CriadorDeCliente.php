<?php

namespace App\Services;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CriadorDeCliente
{
    public function criarCliente(Request $request,string $nome,string $telefone,string $cnpj,string $email,string $origem,string $cidade,string $estado,string $situacao): Cliente
    {
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);//vai retirar qualquer formatação
        $cnpjFormatado = substr($cnpj, 0, 2) . '.' .
            substr($cnpj, 2, 3) . '.' .
            substr($cnpj, 5, 3) . '/' .
            substr($cnpj, 8, 4) . '-' .
            substr($cnpj, 12, 2);

        $telefone = preg_replace("/[^0-9]/", "", $telefone);//vai retirar qualquer formatação
        $telefoneFormatado = '(' . substr($telefone, 0, 2) . ')' .
            substr($telefone, 2, 5) . '-' .
            substr($telefone, 7, 4);


        if(Cliente::find($request->id)){
            DB::beginTransaction();
            $cliente = Cliente::find($request->id);

            $cliente->nome = $nome;
            $cliente->telefone = $telefoneFormatado;
            $cliente->email = $email;
            $cliente->cnpj = $cnpjFormatado;
            $cliente->origem = $origem;
            $cliente->cidade = $cidade;
            $cliente->estado = $estado;
            $cliente->situacao = $situacao;

            $cliente->save();
            DB::commit();

            return $cliente;
        }    

        DB::beginTransaction();
        $cliente = Cliente::create([
            'nome' => $nome,
            'telefone' => $telefoneFormatado,
            'email' => $email,
            'cnpj' => $cnpjFormatado,
            'origem' => $origem,
            'cidade' => $cidade,
            'estado' => $estado,
            'situacao' => $situacao
        ]);
        DB::commit();

        return $cliente;
    }
}