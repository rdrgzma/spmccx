@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Associados Aposentados</h3>
            <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">

                <a class="btn btn-success" href="{{ route('lista.index') }}">
                    Listar todos Associados(as)
                </a>
            
                <a class="btn btn-danger" href="{{route('lista.inativo')}}">
                    Ver ex-associados 
                </a>
                <a class="btn btn-primary" href="{{ route('admin.form.pessoal') }}">
                    {{ __('Cadastrar Novo Associado') }}
                </a>

            </div>
        </div>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Data da Aposentadoria</th>
                <th>Portaria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cadastros as $cadastro)
                @foreach ($cadastro->matriculas as $matricula)
                    @for ($i = 1; $i <= 4; $i++)
                        @php
                            $data = $matricula->{'data_aposentadoria' . $i};
                            $portaria = $matricula->{'portaria_aposentadoria' . $i};
                        @endphp
                        @if ($data)
                            <tr>
                                <td>{{ $cadastro->nome }}</td>
                                <td>{{ $matricula->matricula }}</td>
                                <td>{{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}</td>
                                <td>{{ $portaria }}</td>
                                <td>
                                        <a href="{{ route('cadastros.associado.ver', $cadastro->id) }}"
                                            class="btn btn-sm btn-primary">{{ __('Ver') }}</a>
                                        <a href="{{ route('cadastros.admin.edit', $cadastro->id) }}" class="btn btn-sm btn-warning">{{ __('Editar') }}</a>
                                        <a href="{{route('cadastros.admin.dependente', $cadastro->id)}}" class="btn btn-sm btn-dark">{{ __('Dependentes') }}</a>
                                        <button type="button" class="btn btn-sm bg-danger" data-bs-toggle="modal" data-bs-target="#modalApague{{$cadastro->id}}">
                                            {{ __('APAGAR') }}
                                          </button>
                                          <div class="modal fade" id="modalApague{{$cadastro->id}}" tabindex="-1" aria-labelledby="modalAtiveLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalApagueLabel">APAGAR CADASTRO</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                  <p>Deseja APAGAR o cadastro do(a) associado(a)?</p>
                                                  <h3>Nome: {{$cadastro->nome}}</h3>
                                                  <p> Esta ação é irreversível.</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                  <a  href="{{route('cadastros.destroy',$cadastro->id)}}" type="button" class="btn btn-danger">APAGAR</a>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </td>

                            </tr>
                        @endif
                    @endfor
                @endforeach
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhum associado aposentado encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table> 
</div>

@endsection
