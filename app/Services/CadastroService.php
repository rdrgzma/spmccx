<?php

namespace App\Services;

use App\Models\Autorizacao;
use App\Models\Cadastro;
use App\Models\Dependente;
use App\Models\endereco;
use App\Models\matricula;

class CadastroService
{

    public function storePessoal($data)
    {
        $cadastro = Cadastro::create($data);
        if($cadastro->id){
            $user = new User();
            $user->name = $data['nome'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['cpf']);
            $user->save();
            $data['user_id'] = $user->id;
        }
        return $cadastro;
    }

    public function storeEndereco($data)
    {
        $cadastro = Cadastro::where('id', $data['cadastro_id'])->first();
        $endereco = Endereco::create($data);
        return $cadastro;
    }

    public function storeMatricula($data)
    {
        $cadastro = Cadastro::where('id', $data['cadastro_id'])->first();
        $_turnos = implode(',', $data['turnos']);
        $data['turnos'] = $_turnos;
        $_funcao = implode(',', $data['funcao']);
        $data['funcao'] = $_funcao;
        $matricula = Matricula::create($data);
        return $cadastro;
    }

    public function store($data)
    {
        $user = auth()->user();
        $data['user_id'] = $user->id;
        $funcao = implode(',', $data['funcao']);
        $data['funcao'] = $funcao;
        $_turnos_cc = implode(',', $data['turnos_cc']);
        $data['turnos_cc'] = $_turnos_cc;
        $_turnos_xla = implode(',', $data['turnos_xla']);
        $data['turnos_xla'] = $_turnos_xla;

        $cadastro = Cadastro::create($data);

        $user->update(['cadastro_id' => $cadastro->id, 'telefone' => $data['telefone'], 'has_cadastro_completo' => 1]);

        return $cadastro;
    }

    public function showAssociado($id)
    {

        $cadastro = Cadastro::where('id', $id)->first();
        $endereco = Endereco::where('cadastro_id', $cadastro->id)->first();
        $dependentes = Dependente::where('cadastro_id', $cadastro->id)->get();
        $matriculas = Matricula::where('cadastro_id', $cadastro->id)->first();
        $autorizacoes = Autorizacao::where('cadastro_id', $cadastro->id)->get();
        $user = $cadastro->user;

        return view('cadastro.associado.show', compact('cadastro', 'endereco', 'dependentes', 'matriculas', 'autorizacoes', 'user'));
    }


}
