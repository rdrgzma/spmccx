<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;
    protected $table = 'convenios';
    protected $fillable = [
        'nome',
        'cnpj',
        'user_id',
        'email',
        'telefone',
        'celular',
        'cpf',
        'ativo',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
