@extends('layouts.app')

@section('content')
    <div class="container-xl d-flex justify-content-center align-items-center ">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Autorização de Débito Capão da Canoa') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">

                    <p class="card-text fs-2 m-5 ">
                        Autorizo o <strong>MUNICÍPIO DE CAPÃO DA CANOA</strong>, descontar em minha folha de pagamento,
                        através
                        do <strong>DEPARTAMENTO PESSOAL</strong> ou do<strong> INSTITUTO MUNICIPAL DE SEGURIDADE
                            SOCIAL-</strong>, o percentual
                        de 1% (um por cento), sobre o meu vencimento básico, referente a contribuição mensal, bem como o
                        valor de um dia de trabalho/ano de acordo com minha remuneração mensal, a título de contribuição
                        sindical
                        anual dos associados, a ser repassado ao <strong>SINDICATO DOS PROFISSIONAIS DO MAGISTÉRIO MUNICIPAL
                            DE CAPÃO DA CANOA E XANGRI-LÁ/ SPMCCX.</strong>
                    </p>
                    <form action="" class="d-flex justify-content-center align-items-center mb-5">
                        <div class="form-footer">
                            <button type="submit" class="btn btn-success">Autorizar Débito</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
