<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cadastro;

class PdfController extends Controller
{
    public function pdf()
    {
        $user=auth()->user();
        $cadastro = Cadastro::where('user_id', $user->id)->first();

        return view('cadastro.associado.pdf', compact('cadastro'));
    }

}