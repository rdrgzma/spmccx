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
    <div class="page-body d-flex flex-column justify-content-center align-items-center ">
        <div class="col-md-6">
            <form method="POST" action="{{ route('admin.matricula') }}">
                @csrf
                <input type="hidden" name="cadastro_id" value="{{ $cadastro->id }}">
                <div class="d-flex">
                    <div class="form-group mb-3 col-4">
                        <label class="form-label">Matrícula Funcional</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Matrícula Funcional" name="matricula1">
                        </div>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label class="form-label">Cidade</label>
                        <div>
                            <select class="form-select" name="cidade1">
                                <option value="">Selecione a Cidade</option>
                                <option value="Capão da Canoa">Capão da Canoa</option>
                                <option vaalue="Xangri-lá">Xangri-Lá</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  mb-3 col-4 ">
                        <label class="form-label">Data de Admissão</label>
                        <div>
                            <input type="date" class="form-control" aria-describedby="emailHelp"
                                placeholder="Data de Adimissão" name="data_admissao1">
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group mb-3 col-4">
                        <label class="form-label">Matrícula Funcional</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Matrícula Funcional" name="matricula2">
                        </div>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label class="form-label">Cidade</label>
                        <div>
                            <select class="form-select" name="cidade2">
                                <option value="">Selecione a Cidade</option>
                                <option value="Capão da Canoa">Capão da Canoa</option>
                                <option vaalue="Xangri-lá">Xangri-Lá</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  mb-3 col-4 ">
                        <label class="form-label">Data de Admissão</label>
                        <div>
                            <input type="date" class="form-control" aria-describedby="emailHelp"
                                placeholder="Data de Adimissão" name="data_admissao2">
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group mb-3 col-4">
                        <label class="form-label">Matrícula Funcional</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Matrícula Funcional" name="matricula3">
                        </div>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label class="form-label">Cidade</label>
                        <div>
                            <select class="form-select" name="cidade3">
                                <option value="">Selecione a Cidade</option>
                                <option value="Capão da Canoa">Capão da Canoa</option>
                                <option vaalue="Xangri-lá">Xangri-Lá</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  mb-3 col-4 ">
                        <label class="form-label">Data de Admissão</label>
                        <div>
                            <input type="date" class="form-control" aria-describedby="emailHelp"
                                placeholder="Data de Adimissão" name="data_admissao3">
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group mb-3 col-4">
                        <label class="form-label">Matrícula Funcional</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Matrícula Funcional" name="matricula4">
                        </div>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label class="form-label">Cidade</label>
                        <div>
                            <select class="form-select" name="cidade4">
                                <option value="">Selecione a Cidade</option>
                                <option value="Capão da Canoa">Capão da Canoa</option>
                                <option vaalue="Xangri-lá">Xangri-Lá</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  mb-3 col-4 ">
                        <label class="form-label">Data de Admissão</label>
                        <div>
                            <input type="date" class="form-control" aria-describedby="emailHelp"
                                placeholder="Data de Adimissão" name="data_admissao4">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 ">
                    <label class="form-label">Turnos de Trabalho </label>
                    <div>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" checked="" name="turnos[]" value="Manhã">
                            <span class="form-check-label">Manhã</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="turnos[]" value="Tarde">
                            <span class="form-check-label">Tarde</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="turnos[]" value="Noite">
                            <span class="form-check-label">Noite</span>
                        </label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Cargo/Local de Trabalho</label>
                    <div>
                        <input type="text" class="form-control" placeholder="Cargo/Local de Trabalho" name="cargo">
                    </div>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label class="form-label">Telefone Contato comercial</label>
                    <div>
                        <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx" name="tel_comercial">
                    </div>
                </div>
                <div class="form-group  mb-3">
                    <label class="form-label">Email</label>
                    <div>
                        <input type="email" class="form-control" placeholder="E-mail" name="email_comercial">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Função</label>
                    <div>
                        <label class="form-check form-check form-check-inline ">
                            <input class="form-check-input" type="checkbox" checked="" name="funcao[]"
                                value="Professor(a) anos iniciais">
                            <span class="form-check-label">Professor(a) Anos Iniciais</span>
                        </label>
                        <label class="form-check form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="funcao[]"
                                value="Professor(a) educacao infanti">
                            <span class="form-check-label">Professor(a) Educação
                                Infantil</span>
                        </label>
                        <label class="form-check form-check form-check-inline ">
                            <input class="form-check-input" type="checkbox" name="funcao[]"
                                value="Professor(a) educacao especial">
                            <span class="form-check-label">Professor(a) Educação
                                Especial</span>
                        </label>
                        <label class="form-check form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="funcao[]"
                                value="Supervisor(a) escolar">
                            <span class="form-check-label">Supervisor(a) Escolar</span>
                        </label>
                        <label class="form-check form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="funcao[]"
                                value="Orientador(a) educacional">
                            <span class="form-check-label">Orientador(a) Educacional</span>
                        </label>
                        <div class="d-flex flex-row">
                            <label class="form-check col-3 form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="funcao[]"
                                    value="Professor(a) área">
                                <span class="form-check-label">Professor(a) Área</span>
                            </label>
                            <input type="text" class="form-control p-0" placeholder="Informe a área" name="area">
                        </div>
                    </div>

                </div>
                <div class="form-footer float-end">
                    <button type="submit" id="btn_endereco" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
