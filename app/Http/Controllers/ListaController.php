<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cadastro;
use App\Models\Autorizacao;

class ListaController extends Controller
{
    public function index()
    {
        $cadastros = Cadastro::orderBy('nome')->get();
        $autorizacoes = Autorizacao::all();

        return view('lista.geral', compact('cadastros','autorizacoes'));
    }

    public function listaCapao()
    {
        $cadastros = Cadastro::orderBy('nome')->get();
        $autorizacoes = Autorizacao::all();
        
        return view('lista.capao', compact('cadastros','autorizacoes'));
    }

    public function listaXangrila()
    {
        $cadastros = Cadastro::orderBy('nome')->get();
        $autorizacoes = Autorizacao::all();

        return view('lista.xangrila', compact('cadastros','autorizacoes'));
    }
}
