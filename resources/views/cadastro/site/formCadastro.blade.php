@extends("layouts.app")

@section("content")
<div class="container-xl d-flex justify-content-center align-items-center">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __("Formulário de cadastro de associado site") }}
        </h2>
    </div>
</div>

<div class="page-body d-flex justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="card-title">Cadastro - Associado</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{route('associado.form.store')}}">
                    @csrf

                    {{-- ===========================
                         DADOS PESSOAIS
                    ============================ --}}
                    <h3 class="mb-3">Dados Pessoais</h3>


                    <div class="form-group mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Nome da Mãe</label>
                        <input type="text" class="form-control" name="mae">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Nome do Pai</label>
                        <input type="text" class="form-control" name="pai">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="telefone">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Celular</label>
                            <input type="text" class="form-control" name="celular">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">CPF</label>
                            <input type="text" class="form-control" name="cpf">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">RG</label>
                            <input type="text" class="form-control" name="rg">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">PIS</label>
                            <input type="text" class="form-control" name="pis">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">Sexo</label>
                            <select class="form-select" name="sexo">
                                <option>Selecione</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino" selected>Feminino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" name="data_nascimento">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">Estado Civil</label>
                            <select class="form-select" name="estado_civil">
                                <option value="solteiro(a)" selected>Solteiro(a)</option>
                                <option value="casado(a)">Casado(a)</option>
                                <option value="divorciado(a)">Divorciado(a)</option>
                                <option value="viuvo(a)">Viúvo(a)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Naturalidade</label>
                            <input type="text" class="form-control" name="naturalidade">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Nacionalidade</label>
                            <input type="text" class="form-control" name="nacionalidade">
                        </div>
                    </div>

                    <hr class="mt-4">
                    <h3 class="mb-3">Endereço</h3>

                    <div class="row">
                        <div class="form-group col-md-8 mb-3">
                            <label class="form-label">Logradouro</label>
                            <input type="text" class="form-control" name="logradouro">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">Número</label>
                            <input type="text" class="form-control" name="numero">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">Complemento</label>
                            <input type="text" class="form-control" name="complemento">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">Bairro</label>
                            <input type="text" class="form-control" name="bairro">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">CEP</label>
                            <input type="text" class="form-control" name="cep">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Cidade</label>
                            <input type="text" class="form-control" name="cidade">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select class="form-select" name="estado">
                                @php
                                    $estados = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];
                                @endphp
                                @foreach($estados as $uf)
                                    <option value="{{ $uf }}" {{ $uf == 'RS' ? 'selected' : '' }}>{{ $uf }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

{{-- Alterar apenas a seção de MATRÍCULAS 1 a 4 --}}

<hr class="mt-4">
<h3 class="mb-3">Dados Funcionais</h3>

{{-- MATRÍCULAS 1 a 4 --}}
@for($i = 1; $i <= 4; $i++)
    <div class="card mb-4 border">
        <div class="card-header bg-light">
            <strong>Matrícula Funcional {{ $i }}</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label class="form-label">Matrícula</label>
                    <input type="text" class="form-control" name="matricula{{ $i }}">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label class="form-label">Cidade</label>
                    <select class="form-select" name="cidade{{ $i }}">
                        <option value="">Selecione</option>
                        <option value="Capão da Canoa">Capão da Canoa</option>
                        <option value="Xangri-lá">Xangri-lá</option>
                    </select>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label class="form-label">Data de Admissão</label>
                    <input type="date" class="form-control" name="data_admissao{{ $i }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3 mb-3">
                    <label class="form-label">Portaria Nomeação</label>
                    <input type="text" class="form-control" name="portaria_nomeacao{{ $i }}">
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label class="form-label">Data Nomeação</label>
                    <input type="date" class="form-control" name="data_nomeacao{{ $i }}">
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label class="form-label">Portaria Aposentadoria</label>
                    <input type="text" class="form-control" name="portaria_aposentadoria{{ $i }}">
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label class="form-label">Data Aposentadoria</label>
                    <input type="date" class="form-control" name="data_aposentadoria{{ $i }}">
                </div>
            </div>
        </div>
    </div>
@endfor

                    {{-- CAMPOS FINAIS --}}
                    <hr class="mt-4">
                    <h3 class="mb-3">Informações Complementares</h3>

                    {{-- TURNOS --}}
                    <div class="form-group mb-3">
                        <label class="form-label">Turnos de Trabalho</label>
                        <div>
                            @foreach (['Manhã', 'Tarde', 'Noite'] as $turno)
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="turnos[]" value="{{ $turno }}">
                                    <span class="form-check-label">{{ $turno }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- CONTATO --}}
                    <div class="form-group mb-3">
                        <label class="form-label">Telefone Contato Comercial</label>
                        <input type="text" class="form-control" name="tel_comercial" placeholder="(51) xxxx-xxxx">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">E-mail Comercial</label>
                        <input type="email" class="form-control" name="email_comercial" placeholder="email@dominio.com">
                    </div>

                    {{-- FUNÇÕES --}}
                    <div class="form-group mb-4">
                        <label class="form-label">Função</label>
                        <div>
                            @php
                                $funcoes = [
                                    'Professor(a) anos iniciais',
                                    'Professor(a) educação infantil',
                                    'Professor(a) educação especial',
                                    'Supervisor(a) escolar',
                                    'Orientador(a) educacional',
                                ];
                            @endphp

                            @foreach ($funcoes as $f)
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="funcao[]" value="{{ $f }}">
                                    <span class="form-check-label">{{ $f }}</span>
                                </label>
                            @endforeach

                            <div class="d-flex align-items-center mt-2">
                                <label class="form-check form-check-inline mb-0 me-2">
                                    <input class="form-check-input" type="checkbox" name="funcao[]" value="Professor(a) área">
                                    <span class="form-check-label">Professor(a) Área</span>
                                </label>
                                <input type="text" class="form-control" placeholder="Informe a área" name="area">
                            </div>
                        </div>
                    </div>

                    <div class="form-footer text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-primary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>          

                </form>                
            </div>
        </div>
    </div>
</div>
@endsection
