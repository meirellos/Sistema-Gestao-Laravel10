@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>
    <div class="">
        <form action="{{ route('venda.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button>Buscar</button>
            <a href="{{ route('adicionar.venda') }}" type="button" class="btn btn-success float-end">Adicionar Cliente</a>
        </form>
        <div class="table-responsive small mt-4">
            @if ($findVendas->isEmpty())
                <p>Nenhuma venda encontrado.</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Numeração</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findVendas as $venda)
                            <tr>
                                <td>{{ $venda->numero_da_venda }}</td>
                                <td>{{ $venda->produto->nome }}</td>
                                <td>{{ $venda->cliente->nome }}</td>
                                <td>
                                    <a href="{{route('enviaComprovanteEmail.venda', $venda->id)}}"
                                        class="btn btn-light btn-sm">Enviar E-mail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endsection
