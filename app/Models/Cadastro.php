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


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isAtivo()
    {
        return $this->ativo ==='sim';
    }

    public function dependentes()
    {
        return $this->hasMany(Dependente::class, 'cadastro_id');
    }
    public function autorizacoes()
    {
        return $this->hasMany(Autorizacao::class, 'cadastro_id');
    }

    public function enderecos()
    {
        return $this->hasOne(Endereco::class, 'cadastro_id');
    }
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'cadastro_id');
    }
    
}