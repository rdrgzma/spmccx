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
        'data_nomeacao1',           // NOVO
        'portaria_nomeacao1',        // NOVO
        'data_aposentadoria1',       // NOVO
        'portaria_aposentadoria1',   // NOVO
        'matricula2',
        'cidade2',
        'data_admissao2',
        'data_nomeacao2',           // NOVO
        'portaria_nomeacao2',        // NOVO
        'data_aposentadoria2',       // NOVO
        'portaria_aposentadoria2',   // NOVO
        'matricula3',
        'cidade3',
        'data_admissao3',
        'data_nomeacao3',           // NOVO
        'portaria_nomeacao3',        // NOVO
        'data_aposentadoria3',       // NOVO
        'portaria_aposentadoria3',   // NOVO
        'matricula4',
        'cidade4', 
        'data_admissao4',
        'data_nomeacao4',           // NOVO
        'portaria_nomeacao4',        // NOVO
        'data_aposentadoria4',       // NOVO
        'portaria_aposentadoria4',   // NOVO
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

    public function scopeAposentados($query)
        {
            return $query->where(function ($q) {
                $q->whereNotNull('data_aposentadoria1')
                ->orWhereNotNull('data_aposentadoria2')
                ->orWhereNotNull('data_aposentadoria3')
                ->orWhereNotNull('data_aposentadoria4');
            });
        }

}