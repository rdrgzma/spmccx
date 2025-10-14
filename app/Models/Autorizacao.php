<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizacao extends Model
{
    use HasFactory;
    protected $table = 'autorizacoes';
    protected $fillable = ['user_id','cadastro_id','autorizacao'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cadastro()
    {
        return $this->belongsTo(cadastro::class);
    }
}