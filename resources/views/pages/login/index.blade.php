<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Sistema Gestão</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="cards">
            <div class="img-card">
                <h1>Sistema Gestão</h1>
                <img src="{{ asset('images/card-img.png') }}" alt="Imagem de login">
            </div>
            <div class="login-card">
                <h1>Login</h1>
                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="mb-3 login-form">
                        <input type="email" placeholder="Digite seu e-mail." name="email"
                            class="form-control @error('email') is-invalid @enderror">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="mb-3 login-form">
                        <input type="password" placeholder="Digite sua senha." name="password"
                            class="form-control @error('password') is-invalid @enderror">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-login">ACESSAR</button>
                </form>
                <a href="" class="login-op">Esqueci minha senha</a>
                <a href="{{route('login.register')}}" class="login-op">Criar uma conta</a>
            </div>
        </div>
    </div>
</body>

</html>
