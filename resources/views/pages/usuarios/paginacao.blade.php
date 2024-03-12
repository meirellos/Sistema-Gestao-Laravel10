@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
    </div>
    <div class="">
        <form action="{{ route('usuario.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button>Buscar</button>
            <a href="{{ route('adicionar.usuario') }}" type="button" class="btn btn-success float-end">Adicionar Usuário</a>
        </form>
        <div class="table-responsive small mt-4">
            @if ($findUsers->isEmpty())
                <p>Nenhum usuário encontrado.</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findUsers as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    <a href="{{ route('atualizar.usuario', $usuario->id) }}"
                                        class="btn btn-light btn-sm">Editar</a>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <a onclick="deleteItem( '{{ route('usuario.delete') }}', {{ $usuario->id }} )"
                                        class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endsection
