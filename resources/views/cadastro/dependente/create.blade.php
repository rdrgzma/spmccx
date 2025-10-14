@extends('layouts.app')

@section('content')
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
                    <form method="POST" action="{{ route('dependente.store', $user->id) }}">
                        @csrf
                        <h3 class="mb-3">Dados do Dependente</h3>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Nome Completo*</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3 ">
                                <label class="form-label">Parentesco*</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Parentesco" name="parentesco"
                                        required>
                                </div>

                            </div>
                            <div class="form-group col-md-6 mb-3 ">
                                <label class="form-label">Data de Nascimento*</label>
                                <div>
                                    <input type="date" class="form-control" placeholder="Data de Nascimento"
                                        name="data_nascimento" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
