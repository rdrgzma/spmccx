@extends('layouts.app')
@section('content')
    <div class="container-xl d-flex justify-content-center align-items-center ">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Formulário de cadastro de Associado') }}
            </h2>
        </div>
    </div>
    <div class="page-body d-flex justify-content-center align-items-center ">

        <div class="col-md-6">
            <form method="POST" action="{{ route('admin.autorizacao') }}">
                @csrf
                <input type="hidden" name="cadastro_id" value="{{ $cadastro->id }}">
                <label class="form-check ">
                    <input class="form-check-input" type="radio" checked="" name="autorizacao" value="Capão da Canoa">

                    <p class="card-text form-check-label fs-4  mt-2 ">
                        Autorizo o <strong>MUNICÍPIO DE CAPÃO DA CANOA</strong>, descontar em minha
                        folha de
                        pagamento,
                        através
                        do <strong>DEPARTAMENTO PESSOAL</strong> ou do<strong> INSTITUTO MUNICIPAL DE
                            SEGURIDADE
                            SOCIAL-</strong>, o percentual
                        de 1% (um por cento), sobre o meu vencimento básico, referente a contribuição
                        mensal,
                        bem
                        como o
                        valor de um dia de trabalho/ano de acordo com minha remuneração mensal, a título
                        de
                        contribuição
                        sindical
                        anual dos associados, a ser repassado ao <strong>SINDICATO DOS PROFISSIONAIS DO
                            MAGISTÉRIO
                            MUNICIPAL
                            DE CAPÃO DA CANOA E XANGRI-LÁ/ SPMCCX.</strong>
                    </p>
                </label>
                <div class="form-group mb-3">
                    <label class="form-check ">
                        <input class="form-check-input" type="radio" name="autorizacao" value="Xangri-Lá">
                        <p class="card-text fs-4 mt-5">
                            Autorizo o <strong>MUNICÍPIO DE XANGRI-LÁ</strong>, descontar em minha folha
                            de
                            pagamento,
                            através do <strong>DEPARTAMENTO PESSOAL</strong> ou do<strong> INSTITUTO DE
                                PREVIDENCIA
                                SOCIAL
                                DOS
                                SERVIDORES PÚBLICOS DO MUNICÍPIO DE XANGRI-LÁ –PREV-XANGRI-LÁ</strong>,
                            o
                            percentual
                            de 1% (um por cento), sobre o meu vencimento básico, referente a
                            contribuição
                            mensal,
                            bem
                            como o
                            valor de um dia de trabalho/ano de acordo com minha remuneração mensal, a
                            título de
                            contribuição
                            sindical
                            anual dos associados, a ser repassado ao <strong>SINDICATO DOS PROFISSIONAIS
                                DO
                                MAGISTÉRIO
                                MUNICIPAL
                                DE CAPÃO DA CANOA E XANGRI-LÁ/ SPMCCX.</strong>

                        </p>
                    </label>
                </div>
                <div class="form-footer float-end">
                    <button type="submit" id="btn_autorizacao" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>

    </div>
@endsection
