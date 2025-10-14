<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    use HasFactory;
    protected $table = 'dependentes';
    protected $fillable = ['user_id','cadastro_id', 'nome', 'data_nascimento', 'parentesco', 'created_at','updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cadastro()
    {
        return $this->belongsTo(Cadastro::class);
    }
}