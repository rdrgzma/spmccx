@extends('layouts.guest')

@section('content')
    <form class="card card-md" action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
            <div class="d-flex justify-content-center mb-3">
            <img src="{{ asset('img/logo_sindicato_circle.png') }}" class="w-25 " alt="{{ config('app.name') }}" class="mb-4">
            </div>
            
            <h2 class="card-title text-center mb-4">{{ __('Login do Associado(a) ') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Digite o seu email') }}"
                    required autofocus tabindex="1">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">
                    {{ __('Senha') }}

                </label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Digite a sua senha') }}" required tabindex="2">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" tabindex="3" name="remember" />
                    <span class="form-check-label">{{ __('Manter conectado neste dispositivo') }}</span>
                </label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('Entrar') }}</button>
            </div>
        </div>
    </form>

  <!--  @if (Route::has('register'))
        <div class="text-center text-muted mt-3">
            {{ __('Ainda não sou associado(a)') }} <a href="{{ route('register') }}"
                tabindex="-1">{{ __('Cadastrar') }}</a>
        </div> -->
    @endif
@endsection
