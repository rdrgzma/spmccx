@extends('layouts.app')

@section('content')
    <div class="container-xl d-flex justify-content-center align-items-center " >
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Formulário de cadastro de sócio') }}
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
                    <form method="POST" action="{{ route('associado.store') }}">
                        @csrf
                        <h3 class="mb-3">Dados Pessoais</h3>
                        <div class="form-group col-md-4 mb-3 ">
                            <label class="form-label">Data de Associação*</label>
                            <div>
                                <input type="date" class="form-control" aria-describedby="emailHelp"
                                    placeholder="Data de Associação" name="data_associacao" required>
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Nome Completo*</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Nome" name="nome"
                                    value="{{ $user->name }}" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email*</label>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Nome da Mãe*</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Mãe" name="mae" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Nome do Pai</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Pai" name="pai">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6 mb-3 ">
                                <label class="form-label">Telefone</label>
                                <div>
                                    <input type="phone" id="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="telefone">
                                </div>
                            </div>
                            <div class="form-group col-6 mb-3 ">
                                <label class="form-label">Celular</label>
                                <div>
                                    <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="celular">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">CPF*</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="CPF somente números"
                                            name="cpf" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">RG*</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="RG somente números" name="rg"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">PIS</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="PIS" name="pis">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Sexo*</label>
                                <div>
                                    <select class="form-select" name="sexo">
                                        <option>Selecione</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Data de Nascimento*</label>
                                <div>
                                    <input type="date" class="form-control" name="data_nascimento" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Estado Civil*</label>
                                <div>
                                    <select class="form-select" name="estado_civil">
                                        <option value="solteiro(a)">Solteiro(a)</option>
                                        <option value="casado(a)">Casado(a)</option>
                                        <option value="divorciado(a)">Divorciado(a)</option>
                                        <option value="viuvo(a)">Viúvo(a)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Naturalidade*</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Cidade/Estado"
                                        name="naturalidade" required>
                                </div>

                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Nacionalidade*</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Nacionalidade"
                                        name="nacionalidade" value="Brasileira" required>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <h3 class="mb-3">Endereço</h3>
                        <div class="row">
                            <div class="form-group mb-3 col-md-8">
                                <label class="form-label">Logradouro*</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Avenda/Estrada/Rua"
                                        name="logradouro" required>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Número</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Número" name="numero">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Complemento</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Complemento" name="complemento">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Bairro*</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Bairro" name="bairro" required>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">CEP</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="CEP - somente números"
                                        name="cep">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Cidade*</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Cidade" name="cidade" required>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Estado*</label>
                                <div>
                                    <select class="form-select" name="estado">
                                        <option value="">Selecione o Estado</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <h3 class="mb-3">Dados Funcionais</h3>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Matrícula Funcional Capão da Canoa</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Matrícula Funcional Capão da Canoa" name="matricula_cc">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Turnos de Trabalho Capão da Canoa</label>
                                <div>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" checked="" name="turnos_cc[]"
                                            value="Manhã">
                                        <span class="form-check-label">Manhã</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="turnos_cc[]" value="Tarde">
                                        <span class="form-check-label">Tarde</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="turnos_cc[]" value="Noite">
                                        <span class="form-check-label">Noite</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Data de Admissão Capão da Canoa</label>
                                <div>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Data de Adimissão" name="data_admissao_cc">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Matrícula Funcional Xangri-lá</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Matrícula Funcional Xangri-lá"
                                        name="matricula_xla">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Turnos de Trabalho Xangri-lá</label>
                                <div>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" checked="" name="turnos_xla[]"
                                            value="Manhã">
                                        <span class="form-check-label">Manhã</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="turnos_xla[]" value="Tarde">
                                        <span class="form-check-label">Tarde</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="turnos_xla[]" value="Noite">
                                        <span class="form-check-label">Noite</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Data de Admissão Xangri-lá</label>
                                <div>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Data de Adimissão" name="data_admissao_xla">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label">Cargo/Local de Trabalho Capão da Canoa</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Cargo/Local de Trabalho Capão da Canoa" name="cargo_cc">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label">Cargo/Local de Trabalho Xangri-lá</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Cargo/Local de Trabalho Xangri-lá" name="cargo_xla">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Telefone Contato comercial</label>
                                    <div>
                                        <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx"
                                            name="tel_comercial_cc">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <div>
                                        <input type="email" class="form-control" placeholder="E-mail"
                                            name="email_comercial_cc">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Função</label>
                            <div>
                                <label class="form-check ">
                                    <input class="form-check-input" type="checkbox" checked="" name="funcao[]"
                                        value="Professor(a) anos iniciais">
                                    <span class="form-check-label">Professor(a) Anos Iniciais</span>
                                </label>
                                <label class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="funcao[]"
                                        value="Professor(a) educacao infanti">
                                    <span class="form-check-label">Professor(a) Educação Infantil</span>
                                </label>
                                <label class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="funcao[]"
                                        value="Professor(a) educacao especial">
                                    <span class="form-check-label">Professor(a) Educação Especial</span>
                                </label>
                                <label class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="funcao[]"
                                        value="Supervisor(a) escolar">
                                    <span class="form-check-label">Supervisor(a) Escolar</span>
                                </label>
                                <label class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="funcao[]"
                                        value="Orientador(a) educacional">
                                    <span class="form-check-label">Orientador(a) Educacional</span>
                                </label>
                                <div class="d-flex flex-row">
                                    <label class="form-check col-3">
                                        <input class="form-check-input" type="checkbox" name="funcao[]"
                                            value="Professor(a) área">
                                        <span class="form-check-label">Professor(a) Área</span>
                                    </label>
                                    <input type="text" class="form-control p-0" placeholder="Área" name="area">
                                </div>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <h3 class="mb-3">Autorização Contribuição</h3>
                        <label class="form-check ">
                            <input class="form-check-input" type="radio" checked="" name="autorizacao"
                                value="Capão da Canoa">

                            <p class="card-text form-check-label fs-4  mt-2 ">
                                Autorizo o <strong>MUNICÍPIO DE CAPÃO DA CANOA</strong>, descontar em minha folha de
                                pagamento,
                                através
                                do <strong>DEPARTAMENTO PESSOAL</strong> ou do<strong> INSTITUTO MUNICIPAL DE SEGURIDADE
                                    SOCIAL-</strong>, o percentual
                                de 1% (um por cento), sobre o meu vencimento básico, referente a contribuição mensal,
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
                        <div class="form-group mb-3">
                            <label class="form-check ">
                                <input class="form-check-input" type="radio" name="autorizacao" value="Xangri-Lá">
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
<script>
    $(document).ready(function(){
    $('.date').mask('11/11/1111');
    $('.time').mask('00:00:00');
    $('.date_time').mask('99/99/9999 00:00:00');
    $('.cep').mask('99999-999');
    $('#phone').mask('(99) 9999-9999');
    $('.phone_us').mask('(999) 999-9999');
    $('.mixed').mask('AAA 000-S0S');
  });
    </script>
