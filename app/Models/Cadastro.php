<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;
    
    protected $table = 'cadastros';
    
    protected $fillable = [
        'nome',
        'data_associacao',
        'user_id',
        'email',
        'telefone',
        'celular',
        'mae',
        'pai',
        'rg',
        'cpf',
        'pis',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'nacionalidade',
        'naturalidade',
        'ativo'
    ];

    /**
     * Relacionamento com usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Verificar se está ativo
     */
    public function isAtivo()
    {
        return $this->ativo === 'sim';
    }

    /**
     * Relacionamento com dependentes
     */
    public function dependentes()
    {
        return $this->hasMany(Dependente::class, 'cadastro_id');
    }
    
    /**
     * Relacionamento com autorizações
     */
    public function autorizacoes()
    {
        return $this->hasMany(Autorizacao::class, 'cadastro_id');
    }

    /**
     * Relacionamento com endereço
     */
    public function enderecos()
    {
        return $this->hasOne(Endereco::class, 'cadastro_id');
    }
    
    /**
     * Relacionamento com matrículas
     */
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'cadastro_id');
    }

    /**
     * Relacionamento com histórico de associação
     */
    public function historicos()
    {
        return $this->hasMany(HistoricoAssociacao::class, 'cadastro_id')
                    ->orderBy('data_acao', 'desc');
    }

    /**
     * Obter último histórico
     */
    public function ultimoHistorico()
    {
        return $this->historicos()->first();
    }

    /**
     * Ativar associado
     */
    public function ativar($motivo = null)
    {
        $this->update(['ativo' => 'sim']);
        
        $this->historicos()->create([
            'user_id' => auth()->id(),
            'acao' => 'ativado',
            'data_acao' => now()->toDateString(),
            'motivo' => $motivo,
            'realizado_por' => auth()->user()->name ?? 'Sistema',
        ]);
    }

    /**
     * Desativar associado
     */
    public function desativar($motivo = null)
    {
        $this->update(['ativo' => 'nao']);
        
        $this->historicos()->create([
            'user_id' => auth()->id(),
            'acao' => 'desativado',
            'data_acao' => now()->toDateString(),
            'motivo' => $motivo,
            'realizado_por' => auth()->user()->name ?? 'Sistema',
        ]);
    }
}