@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">
                    {{ __('Associados') }}
                </h2>
                <form action="{{ route('cadastro.search') }}" method="post" class="">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="{{ __('Pesquisar') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Pesquisar
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Nome') }}</th>
                                <th>{{ __('RG') }}</th>
                                <th>{{ __('CPF') }}</th>
                                <th>{{ __('Telefone') }}</th>
                                <th>{{ __('E-mail') }}</th>
                                <th>{{ __('Celular') }}</th>
                                <th>{{ __('Endereço') }}</th>
                                <th>{{ __('Número') }}</th>
                                <th>{{ __('Complemento') }}</th>
                                <th>{{ __('Bairro') }}</th>
                                <th>{{ __('Cidade') }}</th>
                                <th>{{ __('Estado') }}</th>
                                <th>{{ __('CEP') }}</th>

                                <th>{{ __('Nome Dependente') }}</th>
                                <th>{{ __('Data Nascimento') }}</th>
                                <th>{{ __('Parentesco') }}</th>

                                <th>{{ __('Nome Dependente') }}</th>
                                <th>{{ __('Data Nascimento') }}</th>
                                <th>{{ __('Parentesco') }}</th>

                                <th>{{ __('Nome Dependente') }}</th>
                                <th>{{ __('Data Nascimento') }}</th>
                                <th>{{ __('Parentesco') }}</th>

                                <th>{{ __('Nome Dependente') }}</th>
                                <th>{{ __('Data Nascimento') }}</th>
                                <th>{{ __('Parentesco') }}</th>

                                <th>{{ __('Nome Dependente') }}</th>
                                <th>{{ __('Data Nascimento') }}</th>
                                <th>{{ __('Parentesco') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cadastros as $cadastro)
                                <tr>
                                    <td>{{ $cadastro->nome }}</td>
                                    <td>{{ $cadastro->rg }}</td>
                                    <td>{{ $cadastro->cpf }}</td>
                                    <td>{{ $cadastro->telefone }}</td>
                                    <td>{{ $cadastro->email }}</td>
                                    <td>{{ $cadastro->celular }}</td>
                                    <td>{{ $cadastro->enderecos->logradouro }}</td>
                                    <td>{{ $cadastro->enderecos->numero }}</td>
                                    <td>{{ $cadastro->enderecos->complemento ? $cadastro->enderecos->complemento : '' }}
                                    </td>
                                    <td>{{ $cadastro->enderecos->bairro }}</td>
                                    <td>{{ $cadastro->enderecos->cidade }}</td>
                                    <td>{{ $cadastro->enderecos->estado }}</td>
                                    <td>{{ $cadastro->enderecos->cep }}</td>
                                    @foreach ($cadastro->dependentes as $dependente)
                                        <td>{{ $dependente->nome }}</td>
                                        <td>{{ $dependente->data_nascimento }}</td>
                                        <td>{{ $dependente->parentesco }}</td>
                                    @endforeach



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"
        integrity="sha512-XmZS54be9JGMZjf+zk61JZaLZyjTRgs41JLSmx5QlIP5F+sSGIyzD2eJyxD4K6kGGr7AsVhaitzZ2WTfzpsQzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        TableExport(document.getElementsById("dataTable"), {
            filename: 'excelfile',
            sheetname: "sheet1"
        });
    </script>
@endsection
