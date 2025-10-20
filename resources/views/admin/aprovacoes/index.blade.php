@extends("layouts.app")

@section("content")
<div class="container-xl">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{ __("Aprovação de Cadastros") }}
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Messages -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Tabs -->
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#pendentes" class="nav-link active" data-bs-toggle="tab">
                            Pendentes 
                            <span class="badge bg-warning">{{ $usuariosPendentes->total() }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#aprovados" class="nav-link" data-bs-toggle="tab">
                            Aprovados
                            <span class="badge bg-success">{{ $usuariosAprovados->total() }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                
                <!-- PENDENTES -->
                <div class="tab-pane fade show active" id="pendentes" role="tabpanel">
                    @if ($usuariosPendentes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>CPF</th>
                                        <th>Telefone</th>
                                        <th>Data Cadastro</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuariosPendentes as $user)
                                        <tr>
                                            <td>
                                                <strong>{{ $user->name }}</strong>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->cadastro->cpf ?? '-' }}</td>
                                            <td>{{ $user->telefone ?? '-' }}</td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $user->created_at->format('d/m/Y H:i') }}
                                                </small>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning text-dark">{{ $user->status }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <!-- Visualizar -->
                                                    <a href="{{ route('aprovacoes.show', $user->id) }}" 
                                                       class="btn btn-sm btn-info" 
                                                       title="Visualizar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
                                                    </a>

                                                    <!-- Aprovar -->
                                                    <form action="{{ route('aprovacoes.aprovar', $user->id) }}" 
                                                          method="POST" 
                                                          style="display: inline;"
                                                          onsubmit="return confirm('Aprovar cadastro de {{ $user->name }}?');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success" title="Aprovar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                        </button>
                                                    </form>

                                                    <!-- Rejeitar -->
                                                    <form action="{{ route('aprovacoes.rejeitar', $user->id) }}" 
                                                          method="POST" 
                                                          style="display: inline;"
                                                          onsubmit="return confirm('Rejeitar cadastro de {{ $user->name }}?');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Rejeitar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M18 6l-12 12" />
                                                                <path d="M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginação -->
                        <div class="card-footer d-flex align-items-center">
                            {{ $usuariosPendentes->links() }}
                        </div>
                    @else
                        <div class="empty">
                            <div class="empty-img">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="48" height="48" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path d="M9 12l2 2l4 -4" />
                                </svg>
                            </div>
                            <p class="empty-title">Nenhum cadastro pendente</p>
                            <p class="empty-subtitle text-muted">
                                Todos os cadastros do site foram aprovados.
                            </p>
                        </div>
                    @endif
                </div>

                <!-- APROVADOS -->
                <div class="tab-pane fade" id="aprovados" role="tabpanel">
                    @if ($usuariosAprovados->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>CPF</th>
                                        <th>Telefone</th>
                                        <th>Data Associação</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuariosAprovados as $user)
                                        <tr>
                                            <td>
                                                <strong>{{ $user->name }}</strong>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->cadastro->cpf ?? '-' }}</td>
                                            <td>{{ $user->telefone ?? '-' }}</td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $user->data_associacao ? \Carbon\Carbon::parse($user->data_associacao)->format('d/m/Y') : '-' }}
                                                </small>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">{{ $user->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('aprovacoes.show', $user->id) }}" 
                                                   class="btn btn-sm btn-info" 
                                                   title="Visualizar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginação -->
                        <div class="card-footer d-flex align-items-center">
                            {{ $usuariosAprovados->links() }}
                        </div>
                    @else
                        <div class="empty">
                            <div class="empty-img">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="48" height="48" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M9 10h.01" />
                                    <path d="M15 10h.01" />
                                    <path d="M9 16c.5 1 2 1.5 3 1.5s2.5 -.5 3 -1.5" />
                                </svg>
                            </div>
                            <p class="empty-title">Nenhum cadastro aprovado</p>
                            <p class="empty-subtitle text-muted">
                                Nenhum cadastro do site foi aprovado ainda.
                            </p>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>

@endsection