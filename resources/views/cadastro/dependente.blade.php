@extends('layouts.app')

@section('content')

    @if ($dependentes->count() > 0)
        <div class="container-xl d-flex justify-content-center align-items-center ">
            <!-- Page title -->
            <div class="page-header d-print-none ">
                <h2 class="page-title ">
                    {{ __('Cadastro de dependentes') }}
                    
                </h2
                <br>
              
              <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#modalCreateDependente">
                    Novo Dependente
                  </button>
                  
                    <br>
              <h3>Associado(a): {{$cadastro->nome}}</h3>
            </div>
        </div>
        <div class="page-body d-flex justify-content-center align-items-center ">
                 <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dependente</h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                  
                                    <th scope="col">Nome</th>

                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Grau de Parentesco</th>
                                    <th scope="col">Ações</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dependentes as $dependente)
                                    <tr>
                                        
                                        <td>{{ $dependente->nome }} </td>

                                        <td>{{ date('d/m/Y', strtotime($dependente->data_nascimento)) }}</td>
                                        <td>{{ $dependente->parentesco }}</td>
                                        <td class="d-flex">
                                            
                                                <button type="button" class="btn btn-primary btn-sm mx-3" data-bs-toggle="modal" data-bs-target="#modalUpdateDependente{{$dependente->id}}">Editar</button>
                                            <form action="{{ route('cadastros.admin.dependente.destroy', $cadastro->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <div class="form-group">                           
                                                                <input type="hidden" class="form-control" id="cadastro_id" name="cadastro_id" value="{{ $cadastro->id }}">
                                                                <input type="hidden" class="form-control" id="dependente_id" name="dependente_id" value="{{ $dependente->id }}">
                                                            </div>
                                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                                                                
                                    </tr>

                                       <!-- modal editar dependente -->
                                       <div class="modal fade" id="modalUpdateDependente{{$dependente->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDependenteLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDependenteLabel">Edição Dependente</h5>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('cadastros.admin.dependente.update', $dependente->id) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nome">Nome</label>
                                                                <input type="text" class="form-control" id="nome" name="nome"  value="{{$dependente->nome}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="data_nascimento">Data de Nascimento</label>
                                                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                                                                    value="{{$dependente->data_nascimento}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="parentesco">Grau de Parentesco</label>
                                                                <input type="text" class="form-control" id="parentesco" name="parentesco"
                                                                    value="{{$dependente->parentesco}}">
                                                            </div>
                                                            <div class="form-group">                           
                                                                <input type="hidden" class="form-control" id="cadastro_id" name="cadastro_id" value="{{ $cadastro->id }}">
                                                                <input type="hidden" class="form-control" id="dependente_id" name="dependente_id" value="{{ $dependente->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                               
                                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 

                                       
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-10">
                        <a href="{{route('lista.index')}}" class=" mt-5 btn btn-dark">Voltar</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="container ">
    <div class="d-flex justify-content-center align-items-center flex-column">
                
                        <!-- Page title -->
                        <div class="page-header d-print-none">
                            <h2 class="page-title">
                                {{ __('Não há dependentes cadastrados') }}
                            </h2>
                            
                            
                        </div>
                        <div class="mt-10 ">
                            
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateDependente">
                                Novo Dependente
                            </button>
                        </div>
                </div>
                <div class="mt-10">
                <a href="{{route('lista.index')}}" class=" mt-5 btn btn-dark">Voltar</a>
                </div>

                
            
        </div>


    </div>
    
        

    @endif

                                    <div class="modal fade" id="modalCreateDependente" tabindex="-1" role="dialog" aria-labelledby="modalDependenteLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDependenteLabel">Novo Dependente</h5>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('cadastros.admin.dependente.store',$cadastro->id)}}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nome">Nome</label>
                                                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="data_nascimento">Data de Nascimento</label>
                                                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                                                                    placeholder="Data de Nascimento">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="parentesco">Grau de Parentesco</label>
                                                                <input type="text" class="form-control" id="parentesco" name="parentesco"
                                                                    placeholder="Grau de Parentesco">
                                                            </div>
                                                            <div class="form-group">                           
                                                                <input type="hidden" class="form-control" id="cadastro_id" name="cadastro_id" value="{{ $cadastro->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                             
                                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fim modal -->

    
@endsection
