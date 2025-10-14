<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    function index()
    {
        return view('documento.index');
    }
}