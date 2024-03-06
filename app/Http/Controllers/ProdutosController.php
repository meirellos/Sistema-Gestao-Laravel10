<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    //
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findProdutos =  $this->produto->procurarProdutos(search: $pesquisar ?? '');
        //dd($findProdutos);
        return view('pages.produtos.paginacao', compact('findProdutos'));
    }

    public function adicionarProduto(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validacao = $request->validate([
                'nome' => 'required',
                'valor' => 'required'
                //dd($request->method());
            ]);

            //Adiciona o novo produto
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            Produto::create($data);

            Toastr::success('Adicionado com sucesso!');
            return redirect()->route('produto.index');
        }
        return view('pages.produtos.create');
    }

    public function atualizarProduto(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            $validacao = $request->validate([
                'nome' => 'required',
                'valor' => 'required'
            ]);

            //Atualizar um produto
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $searchProd = Produto::find($id);
            $searchProd->update($data);
            
            return redirect()->route('produto.index');
        }

        //dd($findProduto);
        $catchProduto = Produto::where('id', $id)->first();
        return view('pages.produtos.update', compact('catchProduto'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $findProdUni = Produto::find($id);
        $findProdUni->delete();

        return response()->json(['success' => true]);
    }
}
