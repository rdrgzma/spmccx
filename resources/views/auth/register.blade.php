@extends('layouts.guest')

@section('content')
    <form class="card card-md" action="{{ route('register') }}" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
        <div class="d-flex justify-content-center mb-3">
            <img src="{{ asset('img/logo_sindicato_circle.png') }}" class="w-25 " alt="{{ config('app.name') }}" class="mb-4">
            </div>
            <h2 class="card-title text-center mb-4">{{ __('Cadastre uma nova conta') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('Nome Completo') }}</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('Digite o seu nome completo') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Email ') }}</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('Digite o seu email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Senha') }}</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Digite a sua senha') }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Repita a senha') }}</label>
                <input type="password" name="password_confirmation"
                    class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                    placeholder="{{ __('Repita a sua senha') }}">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Criar novo cadastro') }}</button>
            </div>
        </div>
    </form>

    @if (Route::has('login'))
        <div class="text-center text-muted mt-3">
            {{ __('Eu já possuo associado(a).') }} <a href="{{ route('login') }}"
                tabindex="-1">{{ __('Entrar') }}</a>
        </div>
    @endif
@endsection
