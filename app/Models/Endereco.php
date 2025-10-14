<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';
    protected $fillable = [
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'user_id',
        'cadastro_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cadastro()
    {
        return $this->belongsTo(cadastro::class);
    }
}