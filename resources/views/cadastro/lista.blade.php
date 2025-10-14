@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">
                    {{ __('Associados') }}
                </h2>
                <form action="{{ route('cadastro.search') }}" method="post" class="">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="{{ __('Pesquisar') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Pesquisar 
                            </button>
                        </div>
                    </div>
                </form>
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
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="table-responsive">
                    <div class="d-flex justify-content-center">
                        {{ $cadastros->links() }}
                    </div>
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Nome') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Telefone') }}</th>
                                <th>{{ __('Data de Associação') }}</th>
                                <th>{{ __('Associado(a)') }}</th>
                                <th>{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cadastros as $cadastro)
                                <tr>
                                    <td>{{ $cadastro->nome }}</td>
                                    <td>{{ $cadastro->email }}</td>
                                    <td>{{ $cadastro->telefone }}</td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($cadastro->data_associacao)) }}
                                    </td>
                                    <td>
                                        @if ($cadastro->isAtivo())
                                        <button type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#modalDesative{{$cadastro->id}}">
                                            {{ __('Sim') }}
                                          </button>
                                          <div class="modal fade" id="modalDesative{{$cadastro->id}}" tabindex="-1" aria-labelledby="modalAtiveLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalAtiveLabel">Desativar Associado(a)</h5>
                                                 
                            
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                  <p>Deseja desativar (cancelar a associação)  associado(a)?</p>
                                                  <h3>Nome: {{$cadastro->nome}}</h3>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                  <a  href="{{route('cadastros.admin.ative',$cadastro->id)}}" type="button" class="btn btn-primary">Destivar</a>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                            
                                        @else
                                        <button type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#modalAtive">
                                            {{ __('Não') }}
                                          </button>
                                            
                                        @endif
                                         
                                    </td>
                              
                                    <td>
                                        <a href="{{ route('cadastros.associado.ver', $cadastro->id) }}"
                                            class="btn btn-sm btn-primary">{{ __('Ver') }}</a>
                                        <a href="{{ route('cadastros.admin.edit', $cadastro->id) }}" class="btn btn-sm btn-warning">{{ __('Editar') }}</a>
                                        <a href="{{route('cadastros.admin.dependente', $cadastro->id)}}" class="btn btn-sm btn-dark">{{ __('Dependentes') }}</a>
                                        <button type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#modalApague{{$cadastro->id}}">
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
                               
                            @endforeach
                           
                        </tbody>
                    </table>
                </div> 
            </div>          
            <div class="d-flex justify-content-center">
                {{ $cadastros->links() }}
            </div>
            
        </div>
    </div>
@endsection