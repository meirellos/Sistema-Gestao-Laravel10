@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>
    <div class="">
        <form action="{{ route('cliente.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button>Buscar</button>
            <a href="{{ route('adicionar.cliente') }}" type="button" class="btn btn-success float-end">Adicionar Cliente</a>
        </form>
        <div class="table-responsive small mt-4">
            @if ($findClientes->isEmpty())
                <p>Nenhum cliente encontrado.</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Logradouro</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findClientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->endereco }}</td>
                                <td>{{ $cliente->logradouro }}</td>
                                <td>{{ $cliente->cep }}</td>
                                <td>{{ $cliente->bairro }}</td>
                                <td>
                                    <a href="{{ route('atualizar.cliente', $cliente->id) }}"
                                        class="btn btn-light btn-sm">Editar</a>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <a onclick="deleteItem( '{{ route('cliente.delete') }}', {{ $cliente->id }} )"
                                        class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endsection
