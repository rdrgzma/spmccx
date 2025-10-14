@extends('layouts.app')

@section('content')
    <div class="container-xl d-flex justify-content-center align-items-center ">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Formulário de cadastro de Associado') }}
            </h2>
            <h3 class="text-center"> Endereço</h3>

        </div>
    </div>
    <div class="page-body d-flex flex-column justify-content-center align-items-center  mt-5">
        <div class="col-md-6">
            <form method="POST" action="{{ route('admin.endereco') }}">
                @csrf
                <div class="row">
                    <input type="hidden" name="cadastro_id" value="{{ $cadastro->id }}">
                    <div class="form-group mb-3 col-md-8">
                        <label class="form-label">Logradouro*</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Avenda/Estrada/Rua" name="logradouro"
                                required>
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Número</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Número" name="numero">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Complemento</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Complemento" name="complemento">
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Bairro*</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Bairro" name="bairro" required>
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">CEP</label>
                        <div>
                            <input type="text" class="form-control" placeholder="CEP - somente números" name="cep">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Cidade*</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Cidade" name="cidade" required>
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Estado*</label>
                        <div>
                            <select class="form-select" name="estado">
                                <option value="">Selecione o Estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-footer float-end">
                    <button type="submit" id="btn_endereco" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
