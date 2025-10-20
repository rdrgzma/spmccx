<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoAssociacao extends Model
{
    use HasFactory;

    protected $table = 'historicos_associacao';

    protected $fillable = [
        'cadastro_id',
        'user_id',
        'acao',
        'data_acao',
        'motivo',
        'realizado_por',
    ];

    protected $casts = [
        'data_acao' => 'date',
    ];

    /**
     * Relacionamento com cadastro
     */
    public function cadastro()
    {
        return $this->belongsTo(Cadastro::class);
    }

    /**
     * Relacionamento com usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}