@extends('index')
@section('content')
    <form method="POST" action="{{ route('atualizar.cliente', $catchCli->id) }}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Cliente</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{ isset($catchCli->nome) ? $catchCli->nome : old('nome') }}" class="form-control @error('nome') is-invalid @enderror"
                name="nome">
            @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" value="{{ isset($catchCli->email) ? $catchCli->email : old('email') }}" class="form-control @error('email') is-invalid @enderror"
                name="email">
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">CEP</label>
            <input id="cep" type="text" value="{{ isset($catchCli->cep) ? $catchCli->cep : old('cep') }}" class="form-control @error('cep') is-invalid @enderror"
                name="cep">
            @if ($errors->has('cep'))
                <div class="invalid-feedback">{{ $errors->first('cep') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input id="endereco" type="text" value="{{ isset($catchCli->endereco) ? $catchCli->endereco : old('endereco') }}" class="form-control @error('endereco') is-invalid @enderror"
                name="endereco">
            @if ($errors->has('endereco'))
                <div class="invalid-feedback">{{ $errors->first('endereco') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Logradouro</label>
            <input id="logradouro" type="text" value="{{ isset($catchCli->logradouro) ? $catchCli->logradouro : old('logradouro') }}"
                class="form-control @error('logradouro') is-invalid @enderror" name="logradouro">
            @if ($errors->has('logradouro'))
                <div class="invalid-feedback">{{ $errors->first('logradouro') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Bairro</label>
            <input id="bairro" type="text" value="{{ isset($catchCli->bairro) ? $catchCli->bairro : old('bairro') }}" class="form-control @error('bairro') is-invalid @enderror"
                name="bairro">
            @if ($errors->has('bairro'))
                <div class="invalid-feedback">{{ $errors->first('bairro') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Gravar</button>
    </form>
@endsection
