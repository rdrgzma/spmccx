@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">
                    {{ __('Associados') }}
                </h2>
                <form action="{{route('convenios.search')}}" method="post" class="">
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
                <a class="btn btn-success" href="{{route('convenios.list')}}">
                    Listar todos
                </a>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card
            @isset($cadastros)
                <div class="table-responsive">
                    <div class="d-flex justify-content-center">
                        {{ $cadastros->links() }}
                    </div>
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
               <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Nome') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Telefone') }}</th>
                                <th>{{ __('Ativo') }}</th>
                                <th>{{ __('Ações') }}</th>
                            </tr>
                        </thead>   
                        <tbody>
                            @if ($cadastros->count() > 0)
                                    @foreach ($cadastros as $cadastro)
                                    <tr>
                                        <td>{{ $cadastro->nome }}</td>
                                        <td>{{ $cadastro->email }}</td>
                                        <td>{{ $cadastro->telefone }}</td>       
                                        <td>{{ $cadastro->ativo }}</td>
                                        <td>
                                            <a href="{{route('convenios.dependentes', $cadastro->id)}}" class="btn btn-sm btn-dark">{{ __('Dependentes') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum registro encontrado</td>
                                </tr>
                            @endif
                            
                            
                            </tbody>
                    </table>
                </div>
             

            </div>
            <div class="modal fade" id="modalViewAssociado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Dependentes</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <table>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Parentesco</th>
                                    <th>Data de Nascimento</th>          
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dependentes as $item)
                                @isset($cadastro)
                                    @if ($item->cadastro_id == $cadastro->id)
                                    @endisset
                                    <tr>
                                        <td>{{ $item->nome}}</td>
                                        <td>{{ $item->parentesco }}</td>
                                        <td>{{ $item->data_nascimento }}</td>
                                    </tr>  
                                    @endif                                  
                                @endforeach
                            </tbody>
                        </table>


                      
                     
                    </div>
        
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                     <input type="submit" class="btn btn-primary" value="Salvar">
               
                    </div
                    @endisset
                    @if(isset($cadastros))
                    <h3> Nenhum associado encontrado!</h3>
                    @endif
                    
                      <div class="d-flex justify-content-center">
                {{ $cadastros->links() }}
            </div>
            
        </div>
    </div>
        </div>
    </div>
    
@endsection