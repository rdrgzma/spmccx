@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Associados') }}
                    </h2>
                </div>
            </div>

            <!-- Controles -->
            <div class="row g-2 mb-3">
                <div class="col-12 col-md-4">
                    <form action="{{ route('cadastro.search') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="{{ __('Pesquisar') }}">
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-12 col-md-8 text-end">
                    <a class="btn btn-success" href="{{ route('lista.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                            <line x1="12" y1="12" x2="20" y2="7.5" />
                            <line x1="12" y1="12" x2="12" y2="21" />
                            <line x1="12" y1="12" x2="4" y2="7.5" />
                        </svg>
                        Listar Todos
                    </a>

                    <a class="btn btn-info" href="{{ route('admin.aposentados') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="12" cy="7" r="4" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        Aposentados
                    </a>

                    <a class="btn btn-danger" href="{{ route('lista.inativo') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                        Ex-Associados
                    </a>

                    <a class="btn btn-primary" href="{{ route('admin.form.pessoal') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Novo Cadastro
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Alertas -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Tabela -->
            <div class="card">
                <div class="table-responsive">
                    @if ($cadastros->count() > 0)
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('Nome') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Telefone') }}</th>
                                    <th>{{ __('Data de Associação') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th>{{ __('Ações') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cadastros as $cadastro)
                                    <tr>
                                        <td>
                                            <strong>{{ $cadastro->nome }}</strong>
                                        </td>
                                        <td>
                                            <small>{{ $cadastro->email }}</small>
                                        </td>
                                        <td>{{ $cadastro->telefone ?? '-' }}</td>
                                        <td>
                                            {{ $cadastro->data_associacao ? date('d/m/Y', strtotime($cadastro->data_associacao)) : '-' }}
                                        </td>
                                        <td class="text-center">
                                            <button type="button" 
                                                    class="badge {{ $cadastro->isAtivo() ? 'bg-success' : 'bg-danger' }} cursor-pointer" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalStatus{{ $cadastro->id }}"
                                                    style="border: none; padding: 8px 12px; font-size: 12px;">
                                                {{ $cadastro->isAtivo() ? 'Ativo' : 'Inativo' }}
                                            </button>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <!-- Ver -->
                                                <a href="{{ route('cadastros.associado.ver', $cadastro->id) }}"
                                                   class="btn btn-primary" title="Visualizar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <circle cx="12" cy="12" r="2" />
                                                        <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6" />
                                                    </svg>
                                                </a>

                                                <!-- Editar -->
                                                <a href="{{ route('cadastros.admin.edit', $cadastro->id) }}" 
                                                   class="btn btn-warning" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                </a>

                                                <!-- Dependentes -->
                                                <a href="{{ route('cadastros.admin.dependente', $cadastro->id) }}" 
                                                   class="btn btn-dark" title="Dependentes">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <circle cx="9" cy="7" r="4" />
                                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                        <path d="M16 11h6" />
                                                        <circle cx="19" cy="11" r="3" />
                                                    </svg>
                                                </a>

                                                <!-- Deletar -->
                                                <button type="button" 
                                                        class="btn btn-danger" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalDelete{{ $cadastro->id }}"
                                                        title="Deletar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <polyline points="3 6 5 6 21 6" />
                                                        <path d="M19 6a2 2 0 0 0 -2 -2h-12a2 2 0 0 0 -2 2m3 0v14a2 2 0 0 0 2 2h6a2 2 0 0 0 2 -2v-14" />
                                                        <line x1="10" y1="11" x2="10" y2="17" />
                                                        <line x1="14" y1="11" x2="14" y2="17" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="empty" style="padding: 60px 20px;">
                            <div class="empty-img">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="48" height="48" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="9" x2="15" y2="15" />
                                    <line x1="15" y1="9" x2="9" y2="15" />
                                </svg>
                            </div>
                            <p class="empty-title">Nenhum associado encontrado</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Paginação -->
            <div class="d-flex justify-content-center mt-4">
                {{ $cadastros->links() }}
            </div>
        </div>
    </div>

    {{-- MODAIS --}}

    {{-- Modal de Status (Ativar/Desativar) --}}
    @foreach ($cadastros as $cadastro)
        <div class="modal fade" id="modalStatus{{ $cadastro->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                    {{-- Header --}}
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            {{ $cadastro->isAtivo() ? 'Desativar' : 'Ativar' }} Associado
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    {{-- Body --}}
                    <div class="modal-body">
                        <div class="mb-3 text-center">
                          
                            <h3 class="fw-bold text-">{{ $cadastro->nome }}</hh36>
                                <br>
                            <small class="text-muted">{{ $cadastro->email }}</small>
                        </div>

                        {{-- Formulário de ação --}}
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    {{ $cadastro->isAtivo() ? 'Desativar Associado' : 'Ativar Associado' }}
                                </h6>
                            </div>
                            <div class="card-body">
                                <form id="formStatus{{ $cadastro->id }}" method="POST">
                                    @csrf
                                     <div class="modal-d-grid gap-2">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                  <a  href="{{route('cadastros.admin.ative',$cadastro->id)}}" type="button" class="btn btn-primary">
                                                                                                {{ $cadastro->isAtivo() ? 'Desativar' : 'Ativar' }}</a>
                                                </div>
                                   
                                </form>
                            </div>
                        </div>

                        {{-- Histórico --}}
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Histórico de Ativações/Desativações</h6>
                            </div>
                            <div class="card-body timeline-container" style="max-height: 400px; overflow-y: auto;">
                                @if ($cadastro->historicos->count() > 0)
                                    <div class="timeline">
                                        @foreach ($cadastro->historicos as $historico)
                                            <div class="timeline-event">
                                                <div class="timeline-event-icon {{ $historico->acao === 'ativado' ? 'bg-success' : 'bg-danger' }}">
                                                    @if ($historico->acao === 'ativado')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <polyline points="5 12 10 17 20 7" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <line x1="18" y1="6" x2="6" y2="18" />
                                                            <line x1="6" y1="6" x2="18" y2="18" />
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div class="timeline-event-content">
                                                    <strong class="text-{{ $historico->acao === 'ativado' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($historico->acao) }}
                                                    </strong>
                                                    <p class="mb-1">
                                                        <small class="text-muted">
                                                            {{ $historico->data_acao->format('d/m/Y') }}
                                                        </small>
                                                    </p>
                                                    <p class="mb-1">
                                                        <small><strong>Por:</strong> {{ $historico->realizado_por }}</small>
                                                    </p>
                                                    @if ($historico->motivo)
                                                        <p class="mb-0">
                                                            <small><strong>Motivo:</strong> {{ $historico->motivo }}</small>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center text-muted py-3">
                                        <p>Nenhum histórico registrado</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal de Deletar --}}
        <div class="modal fade" id="modalDelete{{ $cadastro->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">APAGAR CADASTRO</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Deseja APAGAR o cadastro do(a) associado(a)?</p>
                        <h4>{{ $cadastro->nome }}</h4>
                        <p class="text-danger"><small>Esta ação é irreversível.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <a href="{{ route('cadastros.destroy', $cadastro->id) }}" type="button" class="btn btn-danger">APAGAR</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Script para enviar formulário --}}
        <script>
            document.getElementById('formStatus{{ $cadastro->id }}').addEventListener('submit', function(e) {
                e.preventDefault();
                const url = '{{ $cadastro->isAtivo() ? route("cadastros.desativar", $cadastro->id) : route("cadastros.ativar", $cadastro->id) }}';
                const formData = new FormData(this);
                
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        alert('Erro ao realizar ação');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao realizar ação');
                });
            });
        </script>
    @endforeach

    {{-- CSS para Timeline --}}
    <style>
        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline-event {
            position: relative;
            padding-bottom: 20px;
        }

        .timeline-event::before {
            content: '';
            position: absolute;
            left: -24px;
            top: 25px;
            bottom: -20px;
            width: 2px;
            background: #e9ecef;
        }

        .timeline-event:last-child::before {
            display: none;
        }

        .timeline-event-icon {
            position: absolute;
            left: -38px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .timeline-event-content {
            padding-left: 10px;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .btn-group-sm .btn {
            padding: 4px 8px;
            font-size: 12px;
        }
    </style>
@endsection