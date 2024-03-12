<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    //
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findUsers =  $this->user->procurarUsuarios(search: $pesquisar ?? '');
        return view('pages.usuarios.paginacao', compact('findUsers'));
    }

    public function adicionarUsuario(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validacao = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                //dd($request->method());
            ]);

            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Toastr::success('Adicionado com sucesso!');
            return redirect()->route('usuario.index');
        }
        return view('pages.usuarios.create');
    }

    public function atualizarUsuario(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            $validacao = $request->validate([
                'name' => 'required',
            ]);

            //Atualizar um produto
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $searchUser = User::find($id);
            $searchUser->update($data);
            
            Toastr::success('Atualizado com sucesso!');
            return redirect()->route('usuario.index');
        }

        $catchUser = User::where('id', $id)->first();
        return view('pages.usuarios.update', compact('catchUser'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $findUserUni = User::find($id);
        $findUserUni->delete();

        return response()->json(['success' => true]);
    }
}
