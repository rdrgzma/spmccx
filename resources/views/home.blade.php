@extends('layouts.app')

@section('custom_styles')
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
@if(auth()->user()->origem == 'site' && auth()->user()->has_cadastro_completo == '0')
            <div class="alert alert-danger">
                <div class="alert-title">
                    {{ __('Bem-vindo(a)') }} {{ auth()->user()->name ?? null }}
                </div>
                <div class="text-muted">
                    O seu cadastro de associado está INCOMPLETO.
                    Complete o seu cadastro para poder utilizar os benefícios do seu sindicato!
                </div>
            </div>
    @else

            <div class="alert alert-success">
                <div class="alert-title">
                    {{ __('Bem-vindo(a)') }} {{ auth()->user()->name ?? null }}
                </div>
                <div class="text-muted">
                    Area restrita do associado.
                </div>
            </div>
            @endif
        </div>

    </div>
@endsection
