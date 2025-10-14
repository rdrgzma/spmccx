<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependente;
use App\Models\User;


class DependenteController extends Controller
{
    public function index()
    {
        return view('cadastro.dependente.show');
    }

    public function create()
    {
        $user=auth()->user();
        $dependentes = Dependente::where('user_id', $user->id)->get();
        return view('cadastro.dependente.create',compact('user'));
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->user()->id;
        $user=auth()->user();
        Dependente::create($data);
        $dependentes = Dependente::where('user_id', auth()->user()->id)->get();
        return view('cadastro.dependente.show',compact('dependentes','user'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $dependentes=Dependente::where('user_id',$id)->get();


        return view('cadastro.dependente.show',compact('user','dependentes'));

    }

    public function update(Request $request, $id)
    {
        return view('cadastro.dependente.update');

    }

    public function destroy($id)
    {
        Dependente::destroy($id);
        $dependentes = Dependente::where('user_id', auth()->user()->id)->get();
        $user=auth()->user();
        return view('cadastro.dependente.show',compact('user','dependentes'));
    }
}