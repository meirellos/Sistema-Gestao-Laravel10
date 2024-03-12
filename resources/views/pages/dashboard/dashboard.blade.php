@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="dashboard text-center">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Produtos Cadastrados</h5>
                        <p class="card-text">Total de produtos cadastrados no sistema.</p>
                        <a href="#" class="btn btn-primary">{{ $totalProd }}</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Clientes Cadastrados</h5>
                        <p class="card-text">Total de clientes cadastrados no sistema.</p>
                        <a href="#" class="btn btn-primary">{{ $totalCli }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vendas efetuadas</h5>
                        <p class="card-text">Total de vendas feitas no sistema.</p>
                        <a href="#" class="btn btn-primary">{{ $totalVendas }}</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuários cadastrados</h5>
                        <p class="card-text">Total de usuários cadastrados.</p>
                        <a href="#" class="btn btn-primary">{{ $totalUsuarios }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
