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
                    <h3 class="card-title text-center">Cadastro - Edição</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <h3 class="mb-3">Dados Pessoais</h3>
                        <div class= "d-flex justify-content-around align-items-center">

                        <div class="form-group col-md-4 mb-3 ">
                            <label class="form-label">Data de Associação*</label>
                            <div>
                                <input type="date" class="form-control" aria-describedby="emailHelp"
                                    placeholder="Data de Associação" name="data_associacao" required
                                    value="{{$cadastro->data_associacao != null ? $cadastro->data_associacao : '-'}}" >
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-3 ">
                            <label class="form-label">Situação Cadastral</label>
                            <div>
                                <select class="form-select" name="ativo" required>
                                    <option value="S" {{$cadastro->ativo == 'S' ? 'selected' : ''}}>Ativo</option>
                                    <option value="N" {{$cadastro->ativo == 'N' ? 'selected' : ''}}>Inativo</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Nome Completo</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Nome" name="name"
                                    value="{{ $cadastro->nome ? $cadastro->nome : '' }}" >
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ $cadastro->email ? $cadastro->email : '' }}" >
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Nome da Mãe</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Mãe" name="mae"
                                    value="{{ $cadastro->mae ? $cadastro->mae : ''}}" >
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Nome do Pai</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Pai" name="pai"
                                    value="{{ $cadastro->pai ? $cadastro->pai : ''}}" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6 mb-3 ">
                                <label class="form-label">Telefone</label>
                                <div>
                                    <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="telefone"
                                        value="{{ $cadastro->telefone ? $cadastro->telefone : '' }}" >
                                </div>
                            </div>
                            <div class="form-group col-6 mb-3 ">
                                <label class="form-label">Celular</label>
                                <div>
                                    <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="celular"
                                        value="{{ $cadastro->celular ? $cadastro->celular : '' }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">CPF</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="CPF somente números"
                                            name="cpf" value="{{ $cadastro->cpf ? $cadastro->cpf : '' }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">RG</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="RG somente números" name="rg"
                                            value="{{ $cadastro->rg ? $cadastro->rg : '' }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">PIS</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="PIS" name="pis"
                                            value="{{ $cadastro->pis ? $cadastro->pis : ''}}" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Sexo</label>
                               <div>
                                    <select class="form-select" name="sexo" >
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
                                        value="{{ $cadastro->data_nascimento ? $cadastro->data_nascimento : ''}}" >
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3 ">
                                <label class="form-label">Estado Civil</label>
                                <div>
                                    <select class="form-select" name="estado_civil" >
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
                                        name="naturalidade" value="{{ $cadastro->naturalidade ? $cadastro->naturalidade : ''}}" >
                                </div>

                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Nacionalidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Nacionalidade"
                                        name="nacionalidade" value="{{ $cadastro->nacionalidade ? $cadastro->nacionalidade : ''}}"
                                        >
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
                                        name="logradouro" value="{{ $cadastro->endereco->logradouro ? $cadastro->endereco->logradouro : '' }}" >
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Número</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Número" name="numero"
                                        value="{{ $cadastro->endereco->numero ? $cadastro->endereco->numero : '' }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Complemento</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Complemento" name="complemento"
                                        value="{{ $cadastro->endereco->complemento ? $cadastro->endereco->complemento : '' }}" >
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Bairro</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Bairro" name="bairro"
                                        value="{{ $cadastro->endereco->bairro ? $cadastro->endereco->bairro : '' }}" >
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">CEP</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="CEP - somente números" name="cep"
                                        value="{{ $cadastro->endereco->cep ? $cadastro->endereco->cep : ''}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Cidade</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Cidade" name="cidade"
                                        value="{{ $cadastro->endereco->cidade ? $cadastro->endereco->cidade : '' }}" >
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Estado</label>
                                <div>
                                    <select class="form-select" name="estado" >
                                        
                                        <option value="AL" @if ($cadastro->endereco->estado == "AL") selected @endif>Alagoas
                                        </option>
                                        <option value="AC" @if ($cadastro->endereco->estado == "AC") selected @endif>Acre</option>
                                        <option value="AP" @if ($cadastro->endereco->estado == "AP") selected @endif>Amapá</option>
                                        <option value="AM" @if ($cadastro->estado == "AM") selected @endif>Amazonas
                                        </option>
                                        <option value="BA" @if ($cadastro->endereco->estado == "BA") selected @endif>Bahia
                                        </option>
                                        <option value="CE" @if ($cadastro->endereco->estado == "CE") selected @endif>Ceará
                                        </option>
                                        <option value="DF" @if ($cadastro->endereco->estado == "DF") selected @endif>Distrito
                                            Federal</option>
                                        <option value="ES" @if ($cadastro->endereco->estado == "ES") selected @endif>Espírito
                                            Santo</option>
                                        <option value="GO" @if ($cadastro->endereco->estado == "GO") selected @endif>Goiás
                                        </option>
                                        <option value="MA" @if ($cadastro->endereco->estado == "MA") selected @endif>Maranhão
                                        </option>
                                        <option value="MT" @if ($cadastro->endereco->estado == "MT") selected @endif>Mato Grosso
                                        </option>
                                        <option value="MS" @if ($cadastro->endereco->estado == "MS") selected @endif>Mato Grosso
                                            do Sul</option>
                                        <option value="MG" @if ($cadastro->endereco->estado == "MG") selected @endif>Minas Gerais
                                        </option>
                                        <option value="PA" @if ($cadastro->endereco->estado == "PA") selected @endif>Pará</option>
                                        <option value="PB" @if ($cadastro->endereco->estado == "PB") selected @endif>Paraíba
                                        </option>
                                        <option value="PR" @if ($cadastro->endereco->estado == "PR") selected @endif>Paraná
                                        </option>
                                        <option value="PE" @if ($cadastro->endereco->estado == "PE") selected @endif>Pernambuco
                                        </option>
                                        <option value="PI" @if ($cadastro->endereco->estado == "PI") selected @endif>Piauí
                                        </option>
                                        <option value="RJ" @if ($cadastro->endereco->estado == "RJ") selected @endif>Rio de
                                            Janeiro</option>
                                        <option value="RN" @if ($cadastro->endereco->estado == "RN") selected @endif>Rio Grande do
                                            Norte</option>
                                        <option value="RS" @if ($cadastro->endereco->estado == "RS") selected @endif>Rio Grande do
                                            Sul</option>
                                        <option value="RO" @if ($cadastro->endereco->estado == "RO") selected @endif>Rondônia
                                        </option>
                                        <option value="RR" @if ($cadastro->endereco->estado == "RR") selected @endif>Roraima
                                        </option>
                                        <option value="SC" @if ($cadastro->endereco->estado == "SC") selected @endif>Santa
                                            Catarina</option>
                                        <option value="SP" @if ($cadastro->endereco->estado == "SP") selected @endif>São Paulo
                                        </option>
                                        <option value="SE" @if ($cadastro->endereco->estado == "SE") selected @endif>Sergipe
                                        </option>
                                        <option value="TO" @if ($cadastro->endereco->estado == "TO") selected @endif>Tocantins
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <h3 class="mb-3">Dados Funcionais</h3>
                        <div class="row">
                            <div class="d-flex">
                                <div class="form-group mb-3  col-4">
                                    <label class="form-label">Matrícula Funcional</label>                     
                                    <div>
                                        <input type="text" class="form-control" placeholder="Matrícula Funcional" name="matricula1" value="{{$cadastro->matricula->matricula1 ? $cadastro->matricula->matricula1 : ''}}" >
                                    </div>
                                </div>
                                <div class="form-group mb-3 mx-2 col-4">
                                    <label class="form-label">Cidade</label>
                                    
                                    <div>
                                        <input type="text" class="form-control" placeholder="Cidade" name="matricula1" value="{{$cadastro->matricula->cidade1 ? $cadastro->matricula->cidade1 : ''}}" >
                                    </div>
                                </div>                
                                <div class="form-group  mb-3 col-4 ">
                                    <label class="form-label">Data de Admissão</label>
                                    <div>
                                        <input type="date" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Data de Adimissão" name="data_admissao1" value="{{$cadastro->matricula->data_admissao1 ? $cadastro->matricula->data_admissao1 : ''}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="d-flex">
                                <div class="form-group mb-3  col-4">
                                    <label class="form-label">Matrícula Funcional</label>                     
                                    <div>
                                        <input type="text" class="form-control" placeholder="Matrícula Funcional" name="matricula2" value="{{$cadastro->matricula->matricula2 ? $cadastro->matricula->matricula2 : ''}}" >
                                    </div>
                                </div>
                                <div class="form-group mb-3 mx-2 col-4">
                                    <label class="form-label">Cidade</label>
                                    
                                    <div>
                                        <input type="text" class="form-control" placeholder="Cidade" name="cidade2" value="{{$cadastro->matricula->cidade2 ? $cadastro->matricula->cidade2 : ''}}" >
                                    </div>
                                </div>                
                                <div class="form-group  mb-3 col-4 ">
                                    <label class="form-label">Data de Admissão</label>
                                    <div>
                                        <input type="date" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Data de Adimissão" name="data_admissao2" value="{{$cadastro->matricula->data_admissao2 ? $cadastro->matricula->data_admissao2 : ''}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="d-flex">
                                <div class="form-group mb-3  col-4">
                                    <label class="form-label">Matrícula Funcional</label>                     
                                    <div>
                                        <input type="text" class="form-control" placeholder="Matrícula Funcional" name="matricula3" value="{{$cadastro->matricula->matricula3 ? $cadastro->matricula->matricula3 : ''}}">
                                    </div>
                                </div>
                                <div class="form-group mb-3 mx-2 col-4">
                                    <label class="form-label">Cidade</label>
                                    
                                    <div>
                                        <input type="text" class="form-control" placeholder="Cidade" name="cidade3" value="{{$cadastro->matricula->cidade3 ? $cadastro->matricula->cidade3 : ''}}">
                                    </div>
                                </div>                
                                <div class="form-group  mb-3 col-4 ">
                                    <label class="form-label">Data de Admissão</label>
                                    <div>
                                        <input type="date" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Data de Adimissão" name="data_admissao3" value="{{$cadastro->matricula->data_admissao3 ? $cadastro->matricula->data_admissao3 : ''}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="d-flex">
                                <div class="form-group mb-3  col-4">
                                    <label class="form-label">Matrícula Funcional</label>                     
                                    <div>
                                        <input type="text" class="form-control" placeholder="Matrícula Funcional" name="matricula4" value="{{$cadastro->matricula->matricula4 ? $cadastro->matricula->matricula4 : ''}}">
                                    </div>
                                </div>
                                <div class="form-group mb-3 mx-2 col-4">
                                    <label class="form-label">Cidade</label>
                                    
                                    <div>
                                        <input type="text" class="form-control" placeholder="Cidade" name="cidade4" value="{{$cadastro->matricula->cidade4 ? $cadastro->matricula->cidade4 : ''}}">
                                    </div>
                                </div>                
                                <div class="form-group  mb-3 col-4 ">
                                    <label class="form-label">Data de Admissão</label>
                                    <div>
                                        <input type="date" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Data de Adimissão" name="data_admissao4" value="{{$cadastro->matricula->data_admissao4 ? $cadastro->matricula->data_admissao4 : ''}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                 
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label">Cargo/Local de Trabalho </label>
                                <div>
                                    <input type="text" class="form-control"
                                        placeholder="Cargo/Local de Trabalho " name="cargo"
                                        value="{{$cadastro->matricula->cargo ? $cadastro->matricula->cargo : ''}}" >
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Telefone Contato comercial</label>
                                    <div>
                                        <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx"
                                            name="tel_comercial_cc" value="{{$cadastro->matricula->tel_comercial ? $cadastro->matricula->tel_comercial : ''}}" >
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <div>
                                        <input type="email" class="form-control" placeholder="E-mail"
                                            name="email_comercial_cc" value="{{$cadastro->matricula->email_comercial ? $cadastro->matricula->email_comercial : ''}}" >
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Função</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Função" name="funcao"
                                    value="{{$cadastro->matricula->funcao}}" >

                            </div>
                        </div>
                       
                        <div class="form-group mb-3 ">
                            <label class="form-label">Área</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Área" name="area"
                                    value="{{$cadastro->matricula->area}}" >
                            </div>
                        </div>
                       
                </div>
                <div class="form-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>

                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
