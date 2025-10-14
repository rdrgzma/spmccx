<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matricula extends Model
{
    use HasFactory;
    protected $table = 'matriculas';
    protected $fillable = [
        'user_id',
        'cadastro_id',
        'matricula1',
        'cidade1',
        'data_admissao1',
        'matricula2',
        'cidade2',
        'data_admissao2',
        'matricula3',
        'cidade3',
        'data_admissao3',
        'matricula4',
        'cidade4', 
        'data_admissao4',
        'turnos',
        'tel_comercial',
        'email_comercial',
        'funcao',
        'area'
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