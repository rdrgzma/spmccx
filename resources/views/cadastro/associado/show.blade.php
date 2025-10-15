@extends("layouts.app")

@section("content")
<div class="container-xl">

    <div class="page-header d-print-none text-center mb-4">
        <h2 class="page-title">Ficha de Cadastro do Associado</h2>
    </div>

    {{-- Verifica se o associado é aposentado --}}
    @php
        $aposentado = $matriculas->data_aposentadoria1 || 
                      $matriculas->data_aposentadoria2 || 
                      $matriculas->data_aposentadoria3 || 
                      $matriculas->data_aposentadoria4;
    @endphp

    @if($aposentado)
        <div class="alert alert-warning text-center fw-bold py-3" style="background-color: #ffcc80; color:#663c00; border: none;">
            <i class="fa-solid fa-person-cane"></i> ASSOCIADO APOSENTADO
        </div>
    @endif

    <div class="page-body d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="card" id="printArea">
                <div class="card-header">
                    <h3 class="card-title">Dados do Associado</h3>
                </div>
                <div class="card-body">
                    <form>
                        @csrf
                        {{-- ============================================= --}}
                        {{-- DADOS PESSOAIS --}}
                        {{-- ============================================= --}}
                        <h3 class="mb-3">Dados Pessoais</h3>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Data de Associação</label>
                                <input type="date" class="form-control" value="{{ $cadastro->data_associacao }}" disabled>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" value="{{ $cadastro->nome }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CPF</label>
                                <input type="text" class="form-control" value="{{ $cadastro->cpf }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" value="{{ $cadastro->data_nascimento }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail Pessoal</label>
                            <input type="email" class="form-control" value="{{ $cadastro->email }}" disabled>
                        </div>

                        <hr>
                        {{-- ============================================= --}}
                        {{-- ENDEREÇO --}}
                        {{-- ============================================= --}}
                        <h3 class="mb-3">Endereço</h3>

                        <div class="mb-3">
                            <label class="form-label">Logradouro</label>
                            <input type="text" class="form-control" value="{{ $endereco->logradouro }}" disabled>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bairro</label>
                                <input type="text" class="form-control" value="{{ $endereco->bairro }}" disabled>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Cidade</label>
                                <input type="text" class="form-control" value="{{ $endereco->cidade }}" disabled>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">CEP</label>
                                <input type="text" class="form-control" value="{{ $endereco->cep }}" disabled>
                            </div>
                        </div>

                        <hr>
                        {{-- ============================================= --}}
                        {{-- DADOS FUNCIONAIS --}}
                        {{-- ============================================= --}}
                        <h3 class="mb-3">Dados Funcionais</h3>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cargo</label>
                                <input type="text" class="form-control" value="{{ $matriculas->cargo }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Função</label>
                                <input type="text" class="form-control" value="{{ $matriculas->funcao }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Área</label>
                                <input type="text" class="form-control" value="{{ $matriculas->area }}" disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Turnos</label>
                                <input type="text" class="form-control" value="{{ $matriculas->turnos }}" disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Telefone Comercial</label>
                                <input type="text" class="form-control" value="{{ $matriculas->tel_comercial }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail Comercial</label>
                            <input type="text" class="form-control" value="{{ $matriculas->email_comercial }}" disabled>
                        </div>

                        {{-- ============================================= --}}
                        {{-- CARDS DE MATRÍCULAS --}}
                        {{-- ============================================= --}}
                        <hr>
                        <h3 class="mb-3">Matrículas e Situação Funcional</h3>
{{-- flex, mostrar cards uma al=lado do outro --}}
<div class="d-flex  gap-3">

                        @for($i=1; $i<=4; $i++)
                            @php
                                $matricula = $matriculas->{'matricula'.$i};
                                $cidade = $matriculas->{'cidade'.$i};
                                $data_admissao = $matriculas->{'data_admissao'.$i};
                                $data_nomeacao = $matriculas->{'data_nomeacao'.$i};
                                $portaria_nomeacao = $matriculas->{'portaria_nomeacao'.$i};
                                $data_aposentadoria = $matriculas->{'data_aposentadoria'.$i};
                                $portaria_aposentadoria = $matriculas->{'portaria_aposentadoria'.$i};

                                $temDados = $matricula || $data_nomeacao || $portaria_nomeacao || $data_aposentadoria || $portaria_aposentadoria;
                            @endphp

                            @if($temDados)
                                <div class="card mb-3 shadow-sm" style="border-left: 6px solid {{ $data_aposentadoria ? '#ff9800' : '#0d6efd' }};">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Matrícula:  {{ $matricula ?? '—' }}
                                            @if($data_aposentadoria)
                                                <span class="badge bg-warning text-dark ms-2">Aposentado</span>
                                            @endif
                                        </h5>
                                        <p><strong>Cidade:</strong> {{ $cidade ?? '—' }}</p>
                                        <p><strong>Data de Admissão:</strong> {{ $data_admissao ?? '—' }}</p>
                                        <p><strong>Data de Nomeação:</strong> {{ $data_nomeacao ?? '—' }}</p>
                                        <p><strong>Portaria de Nomeação:</strong> {{ $portaria_nomeacao ?? '—' }}</p>
                                        <p><strong>Data de Aposentadoria:</strong> {{ $data_aposentadoria ?? '—' }}</p>
                                        <p><strong>Portaria de Aposentadoria:</strong> {{ $portaria_aposentadoria ?? '—' }}</p>
                                    </div>
                                </div>
                            @endif
                        @endfor
</div>
                    </form>
                </div>

             
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
document.getElementById('btnPrintPdf').addEventListener('click', function() {
    const element = document.getElementById('printArea');
    const opt = {
        margin:       0.5,
        filename:     'ficha_associado_{{ Str::slug($cadastro->nome, "_") }}.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(element).save();
});
</script>
@endsection


