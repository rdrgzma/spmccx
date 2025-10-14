<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorizacaoController extends Controller
{
    public function contribuicaoCC()
    {
        return view('cadastro.autorizacao.contribuicao.capao.create');
    }

    public function contribuicaoXla()
    {
        return view('cadastro.autorizacao.contribuicao.xangrila.create');
    }

    public function storeContribuicaoCC()
    {
//
    }
    public function storeContribuicaoXla()
    {
       //
    }
}