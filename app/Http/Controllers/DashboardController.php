<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalProd = $this->buscaTotalProd();
        $totalCli = $this->buscaTotalCli();
        $totalVendas = $this->buscaTotalVendas();
        $totalUsuarios = $this->buscaTotalUsuarios();
        return view('pages.dashboard.dashboard', compact('totalProd', 'totalCli', 'totalVendas', 'totalUsuarios'));
    }

    public function buscaTotalProd()
    {
        $findProd = Produto::all()->count();

        return $findProd;
    }
    public function buscaTotalCli()
    {
        $findCli = Cliente::all()->count();

        return $findCli;
    }
    public function buscaTotalVendas()
    {
        $findVendas = Venda::all()->count();

        return $findVendas;
    }

    public function buscaTotalUsuarios()
    {
        $findUsers = User::all()->count();

        return $findUsers;
    }
}
