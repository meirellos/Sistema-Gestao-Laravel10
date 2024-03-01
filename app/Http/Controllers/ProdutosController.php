<?php

namespace App\Http\Controllers;

use App\Models\Produto;
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

    public function adicionarProduto(Request $request){
        //dd($request->method());
        if($request->method() == 'POST'){
            //Adiciona o novo produto
        }
        return view('pages.produto.create');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $findProdUni = Produto::find($id);
        $findProdUni->delete();

        return response()->json(['success' => true]);
    }
}
