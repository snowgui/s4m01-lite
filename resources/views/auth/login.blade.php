@extends('layouts.app-clear')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name"><i class="fa fa-snowflake-o"></i></h1>

        </div>

        <h3>Bem vindo,</h3>
        <p>Informe os dados para entrar no sistema.</p>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            
            @csrf

            <div class="form-group">
            <input id="email" type="email" placeholder="* Login/E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">

                <input id="password" placeholder="* Senha" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Entrar</button>

{{-- @if (Route::has('reset.passoword.index'))

            <a href="{{ route('reset.passoword.index') }}" class="btn btn-outline btn-link text-success"><small>Esqueceu sua senha?</small></a>
@endif --}}

            {{-- <p class="text-muted text-center"><small>Não possuí uma conta?</small></p>
            <a class="btn btn-sm btn-success btn-outline btn-block" href="register.html">Criar conta</a> --}}
        </form>
        <p class="m-t"> <small>Sistema Administrativo Web e Mobile &copy; {{Date("Y")}}</small> </p>
    </div>
</div>

@endsection
