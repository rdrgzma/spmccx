@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">
                    {{ __('Associados - Documentos') }}
                </h2>
                <form action="{{ route('users.search') }}" method="post" enctype="multipart/form-data"
                    class="">
                    @csrf
                    <div class="input-group">
                        <input type="file" class="form-control" name="file">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                enviar
                            </button>
                        </div>
                    </div>
                </form>
                <a class="btn btn-success" href="{{ route('users.index') }}">
                    Listar todos
                </a>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">

                @if ($users->hasPages())
                    <div class="card-footer pb-0">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
