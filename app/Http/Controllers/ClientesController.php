<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    //
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    //
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findClientes =  $this->cliente->procurarClientes(search: $pesquisar ?? '');

        return view('pages.clientes.paginacao', compact('findClientes'));
    }

    public function adicionarCliente(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validacao = $request->validate([
                'nome' => 'required',
                //dd($request->method());
            ]);

            //Adiciona o novo cliente
            $data = $request->all();
            Cliente::create($data);
            Toastr::success('Adicionado com sucesso!');

            return redirect()->route('cliente.index');
        }
        return view('pages.clientes.create');
    }

    public function atualizarCliente(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            $validacao = $request->validate([
                'nome' => 'required',
            ]);

            //Atualizar um cliente
            $data = $request->all();

            $searchCli = Cliente::find($id);
            $searchCli->update($data);

            return redirect()->route('cliente.index');
        }

        $catchCli = Cliente::where('id', $id)->first();
        return view('pages.clientes.update', compact('catchCli'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $findCliUni = Cliente::find($id);
        $findCliUni->delete();

        return response()->json(['success' => true]);
    }
}
