@extends('layouts.app')

@section('content')
    <div class="container-xl d-flex justify-content-center align-items-center ">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Formulário de cadastro de Associadoii') }}
            </h2>

        </div>
    </div>
    <div class="page-body d-flex flex-column justify-content-center align-items-center ">
        <div class="col-md-6">
            <form id="form_pessoal" method="POST" action="{{ route('admin.pessoal') }}">
                @csrf
                <div class="form-group col-md-4 mb-3 ">
                    <label class="form-label">Data de Associação*</label>
                    <div>
                        <input type="date" class="form-control" aria-describedby="emailHelp"
                            placeholder="Data de Associação" name="data_associacao" value="{{ old('data_associacao') }}"
                            required>
                    </div>
                </div>
                <div class="form-group mb-3 ">
                    <label class="form-label">Nome Completo*</label>
                    <div>
                        <input type="text" class="form-control" placeholder="Nome" name="nome"
                            value="{{ old('nome') }}" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email*</label>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Nome da Mãe*</label>
                    <div>
                        <input type="text" class="form-control" placeholder="Mãe" name="mae"
                            value="{{ old('mae') }}" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Nome do Pai</label>
                    <div>
                        <input type="text" class="form-control" placeholder="Pai" name="pai"
                            value="{{ old('pai') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6 mb-3 ">
                        <label class="form-label">Telefone</label>
                        <div>
                            <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="telefone"
                                value="{{ old('telefone') }}">
                        </div>
                    </div>
                    <div class="form-group col-6 mb-3 ">
                        <label class="form-label">Celular</label>
                        <div>
                            <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="celular"
                                value="{{ old('celular') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">CPF*</label>
                            <div>
                                <input type="text" class="form-control" placeholder="CPF somente números" name="cpf"
                                    value="{{ old('cpf') }}" required id="cpf">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">RG*</label>
                            <div>
                                <input type="text" class="form-control" placeholder="RG somente números" name="rg"
                                    value="{{ old('rg') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">PIS</label>
                            <div>
                                <input type="text" class="form-control" placeholder="PIS" name="pis"
                                    value="{{ old('pis') }}">
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
                            <input type="date" class="form-control" name="data_nascimento"
                                value="{{ old('data_nascimento') }}" required>
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
                            <input type="text" class="form-control" placeholder="Cidade/Estado" name="naturalidade"
                                value="{{ old('naturalidade') }}" required>
                        </div>

                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Nacionalidade*</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Nacionalidade" name="nacionalidade"
                                value="Brasileira" required>
                        </div>
                    </div>
                </div>
                <div class="form-footer float-end">
                    <button type="submit" id="btn_pessoal" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
