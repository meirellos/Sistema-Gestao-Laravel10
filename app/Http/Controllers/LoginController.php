<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('pages.login.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ], [
            'password.min' => 'A senha deve ter no mínimo :min caracteres.'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação passou...
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validacao = $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|unique:users,email',
                    'password' => 'required|min:5',
                ],
                [
                    'email.unique' => 'O e-mail já está em uso.',
                    'password.min' => 'A senha deve ter no mínimo :min caracteres.'
                ]
            );

            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Toastr::success('Usuário criado com sucesso!');
            return redirect()->route('login.index');
        }
        return view('pages.login.register');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
