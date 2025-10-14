@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-xl">
            <div>
                <button class="btn btn-success mt-3" onclick="downloadPDF()">Download</button>
            </div>
            <div class="contentPDF">
                <div class="page-header d-print-none">
                    <h2 class="page-title">
                        {{ __('Associados') }} - Lista Capão da Canoa
                    </h2>
                </div>

                <div class="page-body">
                    <div class="container-xl">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Nome') }}</th>
                                            <th>{{ __('CPF') }}</th>
                                            <th>{{ __('Data de Associação') }}</th>
                                            <th>{{ __('Cidade') }}</th>
                                            <th>{{ __('Assinatura') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cadastros as $cadastro)
                                            @foreach ($autorizacoes as $autorizacao)
                                                @if($autorizacao->cadastro_id == $cadastro->id && $autorizacao->autorizacao == 'Capão da Canoa')
                                                    <tr>
                                                        <td class="text-uppercase">{{ $cadastro->nome }}</td>
                                                        <td>{{ $cadastro->cpf }}</td>
                                                        <td>
                                                            {{ date('d/m/Y', strtotime($cadastro->data_associacao)) }}
                                                        </td>
                                                        <td class="text-uppercase">{{ $autorizacao->autorizacao }}</td>
                                                        <td>_________________________________</td>
        
                                                    </tr>
                                                    @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <script>
                                function downloadPDF() {
                                    const item = document.querySelector(".contentPDF");

                                    var opt = {
                                        margin: 1,
                                        filename: "listacapao.pdf",
                                        html2canvas: {
                                            scale: 2
                                        },
                                        jsPDF: {
                                            unit: "in",
                                            format: "letter",
                                            orientation: "landscape"
                                        },
                                    };

                                    html2pdf().set(opt).from(item).save();
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page title -->

        </div>
    </div>
@endsection
