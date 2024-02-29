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

    public function delete(Request $request){
        
    }
}
