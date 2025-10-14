@extends("layouts.app")

@section("content")
    <div class="container-xl d-flex justify-content-center align-items-center ">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __("Formulário de cadastro de associado") }}
            </h2>
        </div>
    </div>
    <div class= "page-body d-flex justify-content-center align-items-center">

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
                                    placeholder="Data de Associação" name="data_associacao" disabled
                                    value="{{$cadastro->data_associacao ? }}">
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Nome Completo</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Nome" name="name"
                                    value="{{ $cadastro->nome }}" disabled>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ $cadastro->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Nome da Mãe</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Mãe" name="mae"
                                    value="{{ $cadastro->mae }}" disabled>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Nome do Pai</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Pai" name="pai"
                                    value="{{ $cadastro->pai }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6 mb-3 ">
                                <label class="form-label">Telefone</label>
                                <div>
                                    <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="telefone"
                                        value="{{ $cadastro->telefone }}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-6 mb-3 ">
                                <label class="form-label">Celular</label>
                                <div>
                                    <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="celular"
                                        value="{{ $cadastro->celular }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">CPF</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="CPF somente números"
                                            name="cpf" value="{{ $cadastro->cpf }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">RG</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="RG somente números" name="rg"
                                            value="{{ $cadastro->rg }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">PIS</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="PIS" name="pis"
                                            value="{{ $cadastro->pis }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Sexo</label>
                               <div>
                                    <select class="form-select" name="sexo" disabled>
                                        <option>Selecione</option>
                                        <option value="masculino" {{$cadastro->sexo == "masculino" ? "selected" : ""}}>
                                            Masculino</option>

                                        <option value="feminino" @if ($cadastro->sexo == "feminino") selected @endif>Feminino
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Data de Nascimento</label>
                                <div>
                                    <input type="date" class="form-control" name="data_nascimento"
                                        value="{{ $cadastro->data_nascimento }}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Estado Civil</label>
                                <div>
                                    <select class="form-select" name="estado_civil" disabled>
                                        <option value="solteiro(a)" @if ($cadastro->estado_civil == "solteiro(a)") selected @endif>
                                            Solteiro(a)</option>
                                        <option value="casado(a)" @if ($cadastro->estado_civil == "casado(a)") selected @endif>
                                            Casado(a)</option>
                                        <option value="divorciado(a)" @if ($cadastro->estado_civil == "divorciado(a)") selected @endif>
                                            Divorciado(a)</option>
                                        <option value="viuvo(a)" @if ($cadastro->estado_civil == "viuvo(a)") selected @endif>Viúvo(a)
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Naturalidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Cidade/Estado"
                                        name="naturalidade" value="{{ $cadastro->naturalidade }}" disabled>
                                </div>

                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Nacionalidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Nacionalidade"
                                        name="nacionalidade" value="Brasileira" value="{{ $cadastro->nacionalidade }}"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <h3 class="mb-3">Endereço</h3>
                        <div class="row">
                            <div class="form-group mb-3 col-md-8">
                                <label class="form-label">Logradouro</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Avenda/Estrada/Rua"
                                        name="logradouro" value="{{$endereco->logradouro}}" disabled>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Número</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Número" name="numero"
                                        value="{{ $endereco->numero }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Complemento</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Complemento" name="complemento"
                                        value="{{ $endereco->complemento }}" disabled>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Bairro</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Bairro" name="bairro"
                                        value="{{ $endereco->bairro }}" disabled>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">CEP</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="CEP - somente números" name="cep"
                                        value="{{ $endereco->cep }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Cidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Cidade" name="cidade"
                                        value="{{ $endereco->cidade }}" disabled>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Estado</label>
                                <div>
                                    <select class="form-select" name="estado" disabled>
                                        <option value="">Selecione o Estado</option>
                                        <option value="AL" @if ($endereco->estado == "AL") selected @endif>Alagoas
                                        </option>
                                        <option value="AC" @if ($endereco->estado == "AC") selected @endif>Acre</option>
                                        <option value="AP" @if ($endereco->estado == "AP") selected @endif>Amapá</option>
                                        <option value="AM" @if ($endereco->estado == "AM") selected @endif>Amazonas
                                        </option>
                                        <option value="BA" @if ($endereco->estado == "BA") selected @endif>Bahia
                                        </option>
                                        <option value="CE" @if ($endereco->estado == "CE") selected @endif>Ceará
                                        </option>
                                        <option value="DF" @if ($endereco->estado == "DF") selected @endif>Distrito
                                            Federal</option>
                                        <option value="ES" @if ($endereco->estado == "ES") selected @endif>Espírito
                                            Santo</option>
                                        <option value="GO" @if ($endereco->estado == "GO") selected @endif>Goiás
                                        </option>
                                        <option value="MA" @if ($endereco->estado == "MA") selected @endif>Maranhão
                                        </option>
                                        <option value="MT" @if ($endereco->estado == "MT") selected @endif>Mato Grosso
                                        </option>
                                        <option value="MS" @if ($endereco->estado == "MS") selected @endif>Mato Grosso
                                            do Sul</option>
                                        <option value="MG" @if ($endereco->estado == "MG") selected @endif>Minas Gerais
                                        </option>
                                        <option value="PA" @if ($endereco->estado == "PA") selected @endif>Pará</option>
                                        <option value="PB" @if ($endereco->estado == "PB") selected @endif>Paraíba
                                        </option>
                                        <option value="PR" @if ($endereco->estado == "PR") selected @endif>Paraná
                                        </option>
                                        <option value="PE" @if ($endereco->estado == "PE") selected @endif>Pernambuco
                                        </option>
                                        <option value="PI" @if ($endereco->estado == "PI") selected @endif>Piauí
                                        </option>
                                        <option value="RJ" @if ($endereco->estado == "RJ") selected @endif>Rio de
                                            Janeiro</option>
                                        <option value="RN" @if ($endereco->estado == "RN") selected @endif>Rio Grande do
                                            Norte</option>
                                        <option value="RS" @if ($endereco->estado == "RS") selected @endif>Rio Grande do
                                            Sul</option>
                                        <option value="RO" @if ($endereco->estado == "RO") selected @endif>Rondônia
                                        </option>
                                        <option value="RR" @if ($endereco->estado == "RR") selected @endif>Roraima
                                        </option>
                                        <option value="SC" @if ($endereco->estado == "SC") selected @endif>Santa
                                            Catarina</option>
                                        <option value="SP" @if ($endereco->estado == "SP") selected @endif>São Paulo
                                        </option>
                                        <option value="SE" @if ($endereco->estado == "SE") selected @endif>Sergipe
                                        </option>
                                        <option value="TO" @if ($endereco->estado == "TO") selected @endif>Tocantins
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <h3 class="mb-3">Dados Funcionais</h3>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Matrícula Funcional</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Matrícula Funcional Capão da Canoa" name="matricula_cc"
                                        value="{{ $matriculas->matricula1}}" disabled>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Cidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Função" name="turnos_cc"
                                        value="{{ $matriculas->cidade1}}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Data de Admissão </label>
                                <div>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Data de Adimissão" name="data_admissao_cc"
                                        value="{{ $matriculas->data_admissao1 }}" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Matrícula Funcional</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Matrícula Funcional Capão da Canoa" name="matricula_cc"
                                        value="{{ $matriculas->matricula2}}" disabled>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Cidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Função" name="turnos_cc"
                                        value="{{ $matriculas->cidade2}}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Data de Admissão </label>
                                <div>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Data de Adimissão" name="data_admissao_cc"
                                        value="{{ $matriculas->data_admissao2 }}" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Matrícula Funcional</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Matrícula Funcional Capão da Canoa" name="matricula_cc"
                                        value="{{ $matriculas->matricula3}}" disabled>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Cidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Função" name="turnos_cc"
                                        value="{{ $matriculas->cidade3}}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Data de Admissão </label>
                                <div>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Data de Adimissão" name="data_admissao_cc"
                                        value="{{ $matriculas->data_admissao3 }}" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Matrícula Funcional</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Matrícula Funcional Capão da Canoa" name="matricula_cc"
                                        value="{{ $matriculas->matricula3}}" disabled>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Cidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Função" name="turnos_cc"
                                        value="{{ $matriculas->cidade3}}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Data de Admissão </label>
                                <div>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Data de Adimissão" name="data_admissao_cc"
                                        value="{{ $matriculas->data_admissao3 }}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label">Cargo/Local de Trabalho Capão da Canoa</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Cargo/Local de Trabalho Capão da Canoa" name="cargo_cc"
                                        value="{{ $cadastro->cargo_cc }}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label">Cargo/Local de Trabalho Xangri-lá</label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Cargo/Local de Trabalho Xangri-lá" name="cargo_xla"
                                        value="{{ $cadastro->cargo_xla }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Telefone Contato comercial</label>
                                    <div>
                                        <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx"
                                            name="tel_comercial_cc" value="{{ $cadastro->tel_comercial_cc }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <div>
                                        <input type="email" class="form-control" placeholder="E-mail"
                                            name="email_comercial_cc" value="{{ $cadastro->email_comercial_cc }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Função</label>
                            <div>
                                <textarea class="form-control" rows="3" placeholder="Função" name="funcao"
                                    disabled>{{ $cadastro->funcao }}</textarea>

                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Área</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Área" name="area"
                                    value="{{ $cadastro->area }}" disabled>
                            </div>
                        </div>
                </div>
                <div class="form-footer">
                    <a href="{{ route("home") }}" class="btn btn-primary">Voltar</a>

                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
