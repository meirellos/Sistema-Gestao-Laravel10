<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Produto;

class VendasController extends Controller
{
    //
    private $venda;

    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }
    //
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findVendas =  $this->venda->procurarVendas(search: $pesquisar ?? '');
        return view('pages.vendas.paginacao', compact('findVendas'));
    }

    public function adicionarVenda(Request $request)
    {
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProd = Produto::all();
        $findCli = Cliente::all();
        if ($request->isMethod('POST')) {
            $validacao = $request->validate([
                'produto_id' => 'required',
                'cliente_id' => 'required',
                //dd($request->method());
            ]);

            //Adiciona uma nova venda
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;
            Venda::create($data);
            Toastr::success('Adicionado com sucesso!');

            return redirect()->route('venda.index');
        }

        
        return view('pages.vendas.create', compact('findNumeracao', 'findProd', 'findCli'));
    }
}
