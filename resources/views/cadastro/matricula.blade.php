@extends('layouts.app')

@section('content')
<div class="container-xl d-flex justify-content-center align-items-center ">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('Formulário de cadastro de Associado') }}
        </h2>
    </div>
</div>

<div class="page-body d-flex flex-column justify-content-center align-items-center ">
    <div class="col-md-8">
        <form method="POST" action="{{ route('admin.matricula') }}">
            @csrf
            <input type="hidden" name="cadastro_id" value="{{ $cadastro->id }}">

            {{-- LOOP PRINCIPAL DAS MATRÍCULAS --}}
            @for ($i = 1; $i <= 4; $i++)
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-light">
                        <strong>Matrícula {{ $i }}</strong>
                    </div>
                    <div class="card-body">
                        {{-- DADOS PRINCIPAIS --}}
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Matrícula Funcional</label>
                                <input type="text" class="form-control" name="matricula{{ $i }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Cidade</label>
                                <select class="form-select" name="cidade{{ $i }}">
                                    <option value="">Selecione a Cidade</option>
                                    <option value="Capão da Canoa">Capão da Canoa</option>
                                    <option value="Xangri-lá">Xangri-Lá</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Data de Admissão</label>
                                <input type="date" class="form-control" name="data_admissao{{ $i }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Cargo</label>
                                <input type="text" class="form-control" name="cargo{{ $i }}">
                            </div>
                        </div>

                        {{-- BLOCO DE NOMEAÇÃO E APOSENTADORIA --}}
                        <div class="row border-top pt-3">
                            <div class="col-md-3">
                                <label class="form-label">Data da Nomeação</label>
                                <input type="date" name="data_nomeacao{{ $i }}" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Portaria de Nomeação</label>
                                <input type="text" name="portaria_nomeacao{{ $i }}" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Data da Aposentadoria</label>
                                <input type="date" name="data_aposentadoria{{ $i }}" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Portaria de Aposentadoria</label>
                                <input type="text" name="portaria_aposentadoria{{ $i }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

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
                <label class="form-label">Email Comercial</label>
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

            <div class="form-footer text-end">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection


