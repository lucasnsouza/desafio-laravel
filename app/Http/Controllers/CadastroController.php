<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CadastroController extends Controller
{
    public function create()
    {
        return view('cadastro.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'responsibility' => 'required',
            'name' => 'required|min:5',
            'email' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'state' => 'required',
            'city' => 'required',
            'situation' => 'required',
            'password' => ['required', Password::min(8)
            ->numbers()
            ->letters()
            ->mixedCase()
            ->symbols()
            ->uncompromised()]
        ]);

        //vamos pegar todos os dados do formulário, menos o token do laravel
        // $data = $request->only('responsibility', 'name', 'email', 'phone', 'sex', 'state', 'city', 'situation', 'password');
        
        //formtar telefone
        $userPhone = preg_replace("/[^0-9]/", "", $data['phone']);
        $data['phone'] = '(' . substr($userPhone, 0, 2) . ')' .
        substr($userPhone, 2, 5) . '-' .
        substr($userPhone, 7, 4);

        //fazer hash da senha
        $data['password'] = Hash::make($data['password']);
        
        if(User::find($request->id)) {
            DB::beginTransaction();
            $user = User::find($request->id);

            $user->responsibility = $data['responsibility'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->sex = $data['sex'];
            $user->state = $data['state'];
            $user->city = $data['city'];
            $user->situation = $data['situation'];
            $user->password = $data['password'];

            $user->save();
            DB::commit();

            
        } else {
            //criar usuário
            $user = User::create($data);
        }
        

        if(!Auth::check()) {
            Auth::login($user);

            return redirect()->route('painel_controle');
        }

        $request->session()->flash(
            'mensagem',
            "Novo usuário adicionado com sucesso: {$user->name}."
        );

        return redirect()->route('lista_usuarios');
    }
}
