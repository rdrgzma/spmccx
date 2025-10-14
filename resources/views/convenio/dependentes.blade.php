@extends('layouts.app')

@section('content')

    @if ($dependentes->count() > 0)
        <div class="container-xl d-flex justify-content-center align-items-center ">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <h2 class="page-title">
                    {{ __('Cadastro de dependentes') }}
                </h2>
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
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dependentes as $dependente)
                                    <tr>
                                        
                                        <td>{{ $dependente->nome }}</td>

                                        <td>{{ date('d/m/Y', strtotime($dependente->data_nascimento)) }}</td>
                                        <td>{{ $dependente->parentesco }}</td>
                                                                                
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-10">
                            <a href="{{ route('convenios.list') }}" class=" mt-5 btn btn-dark">Voltar</a>
                            </div>

                       
                        
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-xl d-flex justify-content-center align-items-center ">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <h2 class="page-title">
                    {{ __('Não há dependentes cadastrados') }}
                </h2>
                
            </div>
            <div class="mt-10">
                <a href="{{ route('convenios.list')}}" class=" mt-5 btn btn-dark">Voltar</a>
                </div>

           
            
        </div>
           
        </div>
    @endif
    
@endsection
