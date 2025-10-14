<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom styles for this Page-->


</head>

<body>


    <div class="contentPDF">

        <div class=" d-flex justify-content-center align-items-center ">

            <div class="mx-5">
                <h1>SINDICATO DOS PROFISSIONAIS DO MAGISTÉRIO MUNICIPAL DE CAPÃO DA CANOA E XANGRI-LÁ/ SPMCCX</h1>
                <h2>{{ __('FICHA DE INSCRIÇÃO DE SÓCIO(A)') }}</h2>
                <div class=" print">

                    <h3 class="mb-3">Dados Pessoais</h3>
                    <div class="form-group text-center ">
                        <label class="form-label">Data de Associação: {{ $cadastro->data_associacao }}</label>
                    </div>
                    <div class="form-group  ">
                        <label class="form-label">Nome Completo: {{ $cadastro->user->name }}</label>
                    </div>
                    <div class="form-group ">
                        <label class="form-label">Email: {{ $cadastro->user->email }}</label>
                    </div>
                    <div class="form-label ">
                        <div class="">Filiação:</div>
                        <div class="mx-5"> Mãe: {{ $cadastro->mae }} </div>
                        <div class="mx-5">Pai: {{ $cadastro->pai }}
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-6 ">
                            <label class="form-label">Telefone: {{ $cadastro->telefone }}</label>
                        </div>
                        <div class="form-group col-6 ">
                            <label class="form-label">Celular: {{ $cadastro->celular }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            <div class="form-group col-4 ">
                                <label class="form-label">CPF: {{ $cadastro->cpf }}</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-4 ">
                                <label class="form-label">RG: {{ $cadastro->rg }}</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-4 ">
                                <label class="form-label">PIS: {{ $cadastro->pis }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Sexo: {{ $cadastro->sexo }}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Data de Nascimento:
                                {{ $cadastro->data_nascimento }}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Estado Civil: {{ $cadastro->estado }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-6">
                            <label class="form-label">Naturalidade: {{ $cadastro->naturalidade }}</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Nacionalidade: {{ $cadastro->nacionalidade }}</label>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <h3 class="mb-3">Endereço</h3>
                    <div class="row">
                        <div class="form-group ">
                            <label class="form-label">Logradouro:
                                {{ $cadastro->logradouro }}, {{ $cadastro->numero }},@if ($cadastro->complemento)
                                    {{ $cadastro->complemento }},
                                @endif {{ $cadastro->bairro }},
                                {{ $cadastro->cidade }}, {{ $cadastro->estado }}.</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class=" form-label">CEP:
                                {{ $cadastro->cep }}</label>
                        </div>
                    </div>


                    <hr class="mt-1">

                    <h3 class="mb-3">Dados Funcionais</h3>
                    <div class="row">
                        <div class="form-group ">
                            <label class="form-label">Matrícula Funcional Capão da Canoa:
                                {{ $cadastro->matricula_cc }}</label>
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Turnos de Trabalho Capão da Canoa:
                                {{ $cadastro->turnos_cc }}</label>
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Data de Admissão Capão da Canoa:
                                {{ $cadastro->data_admissao_cc }}</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class=" ">
                            <h4 class="">Matrícula Funcional Xangri-lá:
                                {{ $cadastro->matricula_xla }}</h4>
                        </div>
                        <div class=" ">
                            <h4 class="">Turnos de Trabalho Xangri-lá:
                                {{ $cadastro->turnos_xla }}</h4>
                        </div>
                        <div class="">
                            <h4 class="">Data de Admissão Xangri-lá:
                                {{ $cadastro->data_admissao_xla }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <h4 class="form-label">Cargo/Local de Trabalho Capão da Canoa:
                                {{ $cadastro->cargo_cc }}</h4>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <h4 class="form-label">Cargo/Local de Trabalho Xangri-lá:
                                {{ $cadastro->cargo_xla }}</h4>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <h4 class="form-label">Telefone Contato comercial:
                                    {{ $cadastro->tel_comercial_cc }}</h4>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label">Email: {{ $cadastro->email_comercial_cc }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Função: {{ $cadastro->funcao }}</label>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Área: {{ $cadastro->area }}</label>
                    </div>
                    <hr class="mt-10">
                    <br>
                    <h3 class="mb-3">Autorização Contribuição</h3>

                    @if ($cadastro->autorizacao == 'Capão da Canoa')
                        <label class="form-check ">

                            <p class="card-text form-check-label fs-4  mt-2 ">
                                Autorizo o <strong>MUNICÍPIO DE CAPÃO DA CANOA</strong>, descontar em minha folha de
                                pagamento,
                                através
                                do <strong>DEPARTAMENTO PESSOAL</strong> ou do<strong> INSTITUTO MUNICIPAL DE
                                    SEGURIDADE
                                    SOCIAL-</strong>, o percentual
                                de 1% (um por cento), sobre o meu vencimento básico, referente a contribuição
                                mensal,
                                bem
                                como o
                                valor de um dia de trabalho/ano de acordo com minha remuneração mensal, a título de
                                contribuição
                                sindical
                                anual dos associados, a ser repassado ao <strong>SINDICATO DOS PROFISSIONAIS DO
                                    MAGISTÉRIO
                                    MUNICIPAL
                                    DE CAPÃO DA CANOA E XANGRI-LÁ/ SPMCCX.</strong>
                            </p>
                        </label>
                    @else
                        <label class="form-check ">

                            <p class="card-text fs-4 mt-5">
                                Autorizo o <strong>MUNICÍPIO DE XANGRI-LÁ</strong>, descontar em minha folha de
                                pagamento,
                                através do <strong>DEPARTAMENTO PESSOAL</strong> ou do<strong> INSTITUTO DE
                                    PREVIDENCIA
                                    SOCIAL
                                    DOS
                                    SERVIDORES PÚBLICOS DO MUNICÍPIO DE XANGRI-LÁ –PREV-XANGRI-LÁ</strong>, o
                                percentual
                                de 1% (um por cento), sobre o meu vencimento básico, referente a contribuição
                                mensal,
                                bem
                                como o
                                valor de um dia de trabalho/ano de acordo com minha remuneração mensal, a título de
                                contribuição
                                sindical
                                anual dos associados, a ser repassado ao <strong>SINDICATO DOS PROFISSIONAIS DO
                                    MAGISTÉRIO
                                    MUNICIPAL
                                    DE CAPÃO DA CANOA E XANGRI-LÁ/ SPMCCX.</strong>

                            </p>


                        </label>
                    @endif

                    <div class="flex-colum justify-content-center align-items-center mt-5">
                        <div>
                            ______________________________________________
                        </div>
                        <p>Assinatura do sócio</p>

                    </div>
                    <p>Capão da Canoa _____ de ______________________ de __________</p>

                    <div class="form-footer">
                        <buton onClick="window.print()" class="btn btn-light">Baixar</buton>

                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>


    </div>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Page level custom scripts -->


</body>
