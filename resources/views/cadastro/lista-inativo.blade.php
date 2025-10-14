@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">
                    {{ __('Cadastros Inativos') }}
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
                    Ver cadastros ativos
                </a>
                <a class="btn btn-danger" href="{{ route('lista.inativo') }}">
                    Listar todos inativos
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
                                <th>{{ __('Ativo') }}</th>
                                <th>{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @forelse ($cadastros as $cadastro)
                                    <tr>
                                        <td>{{ $cadastro->nome }}</td>
                                        <td>{{ $cadastro->email }}</td>
                                        <td>{{ $cadastro->telefone }}</td>
                                        <td>
                                            {{ date('d/m/Y', strtotime($cadastro->data_associacao)) }}
                                        </td>
                                        <td>
                                           
                                            <button type="button" class="badge @if(!$cadastro->isAtivo()) bg-success : bg-danger @endif" data-bs-toggle="modal" data-bs-target="#modalAtive{{$cadastro->id}}">
                                                {{ __('Não') }}
                                            </button>
                                            <div class="modal fade" id="modalAtive{{$cadastro->id}}" tabindex="-1" aria-labelledby="modalAtiveLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="modalAtiveLabel">Ativar Associado(a)</h5>
                                                    
                                
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                    <p>Deseja ativar o(a) associado(a)?</p>
                                                    <h3 class="fz-10">Nome: {{$cadastro->nome}}</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    <a  href="{{route('cadastros.admin.ative',$cadastro->id)}}" type="button" class="btn btn-primary">Ativar</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                           
                                            
                                        </td>
                                
                                        <td>
                                            <a href="{{ route('cadastros.associado.ver', $cadastro->id) }}"
                                                class="btn btn-sm btn-primary">{{ __('Ver') }}</a>
                                            <a href="{{ route('cadastros.admin.edit', $cadastro->id) }}" class="btn btn-sm btn-warning">{{ __('Editar') }}</a>
                                            <a href="{{route('cadastros.admin.dependente', $cadastro->id)}}" class="btn btn-sm btn-dark">{{ __('Dependentes') }}</a>
                                        </td>

                                    </tr> 
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <h3>Nenhum registro encontrado</h3>
                                        </td>
                                    </tr>
                                @endforelse
                          
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $cadastros->links() }}
                    </div>
                </div> 
            </div>
        
        </div>
    </div>
@endsection