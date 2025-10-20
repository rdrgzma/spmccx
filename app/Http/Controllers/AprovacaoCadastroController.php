<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AprovacaoCadastroController extends Controller
{
    /**
     * Listar cadastros pendentes do site
     */
    public function index()
    {
        $usuariosPendentes = User::where('origem', 'site')
            ->where('status', 'Aguardando')
            ->with('cadastro')
            ->paginate(15);

        $usuariosAprovados = User::where('origem', 'site')
            ->where('status', 'Ativo')
            ->with('cadastro')
            ->paginate(15);

        return view('admin.aprovacoes.index', compact('usuariosPendentes', 'usuariosAprovados'));
    }

    /**
     * Aprovar cadastro do usuário
     */
    public function aprovar($id)
    {
        $user = User::findOrFail($id);
        $cadastro = $user->cadastro;

        $cadastro->update(['ativo' => 'sim']);



        // Validar se é do site e está pendente
        if ($user->origem !== 'site' || $user->status === 'Ativo') {
            return back()->with('error', 'Este cadastro não pode ser aprovado.');
        }

        $user->update([
            'status' => 'Ativo',
            'data_associacao' => now()->format('Y-m-d'),
        ]);

        return back()->with('success', "Cadastro de {$user->name} foi aprovado com sucesso!");
    }

    /**
     * Rejeitar cadastro do usuário
     */
    public function rejeitar($id)
    {
        $user = User::findOrFail($id);

        // Validar se é do site
        if ($user->origem !== 'site') {
            return back()->with('error', 'Este cadastro não pode ser rejeitado.');
        }

        // Soft delete - marca como inativo
        $user->update(['status' => 'Inativo']);

        // Opcionalmente, deletar cadastro relacionado
        if ($user->cadastro) {
            $user->cadastro->update(['ativo' => 'nao']);
        }

        return back()->with('success', "Cadastro de {$user->name} foi rejeitado.");
    }

    /**
     * Visualizar detalhes do cadastro
     */
    public function show($id)
    {
        $user = User::with('cadastro.enderecos', 'cadastro.dependentes', 'matricula')
            ->findOrFail($id);

        if ($user->origem !== 'site') {
            abort(403, 'Acesso negado');
        }

        return view('admin.aprovacoes.show', compact('user'));
    }
}