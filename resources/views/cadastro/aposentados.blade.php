@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Associados Aposentados</h3>
            <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">

                <a class="btn btn-success" href="{{ route('lista.index') }}">
                    Listar todos Associados(as)
                </a>
            
                <a class="btn btn-danger" href="{{route('lista.inativo')}}">
                    Ver ex-associados 
                </a>
                <a class="btn btn-primary" href="{{ route('admin.form.pessoal') }}">
                    {{ __('Cadastrar Novo Associado') }}
                </a>

            </div>
        </div>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Data da Aposentadoria</th>
                <th>Portaria</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cadastros as $cadastro)
                @foreach ($cadastro->matriculas as $matricula)
                    @for ($i = 1; $i <= 4; $i++)
                        @php
                            $data = $matricula->{'data_aposentadoria' . $i};
                            $portaria = $matricula->{'portaria_aposentadoria' . $i};
                        @endphp
                        @if ($data)
                            <tr>
                                <td>{{ $cadastro->nome }}</td>
                                <td>{{ $matricula->matricula }}</td>
                                <td>{{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}</td>
                                <td>{{ $portaria }}</td>
                            </tr>
                        @endif
                    @endfor
                @endforeach
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhum associado aposentado encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table> 
</div>

@endsection
