@extends('layouts.app')

@section('content')
    <div class="container-xl d-flex justify-content-center align-items-center ">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Formulário de edição de Convênio') }}
            </h2>
        </div>
    </div>
    <div class="page-body d-flex flex-column justify-content-center align-items-center ">
        <div class="col-md-6">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs my-2" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pessoal-tab" data-bs-toggle="tab" data-bs-target="#pessoal"
                        type="button" role="tab" aria-controls="pessoal" aria-selected="true">Dados
                        Convênio</button>
                </li>

            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane my-2 active" id="pessoal" role="tabpanel" aria-labelledby="pessoal-tab"
                    tabindex="0">
                    <form id="form_edit" method="POST" action="{{route('convenios.updateConvenio',['id'=>$convenio->id])}}">
                        @csrf           
                        <div class="form-group mb-3 ">
                            <label class="form-label">Nome *</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Nome" name="nome"
                                value="{{$convenio->nome}}" >
                                    
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email*</label>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ $convenio->email }}" >
                            </div>
                        </div>      
                        <div class="row">
                            <div class="form-group col-6 mb-3 ">
                                <label class="form-label">Telefone</label>
                                <div>
                                    <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx"
                                        name="telefone" value="{{ $convenio->telefone}}">
                                </div>
                            </div>
                            <div class="form-group col-6 mb-3 ">
                                <label class="form-label">Celular</label>
                                <div>
                                    <input type="phone" class="form-control" placeholder="(51)xxxx-xxxxx"
                                        name="celular" value="{{ $convenio->celular }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">CPF*</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="CPF somente números"
                                            name="cpf" value="{{ $convenio->cpf}}"  id="cpf">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">CNPJ*</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="CNPJ somente números"
                                            name="cnpj" value="{{ $convenio->cnpj }}" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                 <button type="submit" class="btn btn-primary">Salvar</button>

                        </div>
                    </form>
                         </div> 
            </div> 
                 </div> 
            </div> 
                 </div> 
            </div> 
              
      
@endsection
