@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">
                    {{ __('Convênios') }}
                </h2>
                <form action="{{ route('users.search') }}" method="post" class="">
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateConvenio">
                    Novo Convênio
                  </button>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Nome') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Telefone') }}</th>
                                <th>{{ __('Celular') }}</th>
                                <th>{{ __('Ativo') }}</th>
                                <th>{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($convenios->count() > 0)
                                @foreach ($convenios as $convenio)
                                    <tr>
                                        <td>{{ $convenio->nome }}</td>
                                        <td>{{ $convenio->email }}</td>
                                        <td>{{ $convenio->telefone }}</td>
                                        <td>{{ $convenio->celular }}</td>
                                        <td>{{ $convenio->ativo }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalViewConvenio">
                                                Ver
                                              </button>

<a href="{{route('convenios.editConvenio', $convenio->id)}}" class="btn btn-warning">Editar</a>
                                                                                                                                          
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">{{ __('Nenhum registro encontrado') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="modalCreateConvenio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo Convênio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('convenios.store')}}" method="post">
            <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Nome') }}</label>
                        <input type="text" class="form-control" id="name" name="nome" placeholder="Nome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>        
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('Telefone') }}</label>
                        <input type="text" class="form-control" id="phone" name="telefone" placeholder="Telefone">
                    </div>
                    <div class="mb-3">
                        <label for="cellphone" class="form-label">{{ __('Celular') }}</label>
                        <input type="text" class="form-control" id="celular" name="celular"
                            placeholder="Celular">
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">{{ __('CPF') }}</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                    </div>  
                    <div class="mb-3">
                        <label for="cnpj" class="form-label">{{ __('CNPJ') }}</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ">
                    </div>
                    <div class="mb-3">
                        <label for="active" class="form-label">{{ __('Ativo') }}</label>
                        <select class="form-select" id="active" name="ativo">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" value="Salvar">
            </div>
    </form>
      </div>
    </div>
  </div>

  <!-- Modal ver Convênio -->

    <div class="modal fade" id="modalViewConvenio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Convênio</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Nome: {{$convenio->nome}}
                <br>
                Email: {{$convenio->email}}
                <br>
                Telefone: {{$convenio->telefone}}
                <br>
                Celular: {{$convenio->celular}}
                <br>
                Ativo: {{$convenio->ativo}}
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
             <input type="submit" class="btn btn-primary" value="Salvar">
       
            </div>
        </form>
          </div>
        </div>
      </div>



      
            

                            
    </div>
    </div>
  
</div>
@endsection
