@extends('layouts.app')

@section('content')

    @if ($dependentes->count() > 0)
        <div class="container-xl d-flex justify-content-center align-items-center ">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <h2 class="page-title">
                    {{ __('Formulário de cadastro de dependentes') }}
                </h2>
            </div>
        </div>
        <div class="page-body d-flex justify-content-center align-items-center ">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>

                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Grau de Parentesco</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dependentes as $dependente)
                                    <tr>
                                        <th scope="row">{{ $dependente->id }}</th>
                                        <td>{{ $dependente->nome }}</td>

                                        <td>{{ $dependente->data_nascimento }}</td>
                                        <td>{{ $dependente->parentesco }}</td>
                                        <td>

                                            <form action="{{ route('dependente.destroy', $dependente->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('dependente.create') }}" class=" mt-5 btn btn-success">Cadastrar novo
                            dependente</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-xl d-flex justify-content-center align-items-center ">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <h2 class="page-title">
                    {{ __('Não há dependentes cadastrados') }}
                </h2>
                <a href="{{ route('dependente.create') }}" class=" mt-5 btn btn-success">Cadastrar novo dependente</a>
            </div>
        </div>
    @endif
@endsection
