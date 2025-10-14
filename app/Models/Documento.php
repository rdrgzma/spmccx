<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'documentos';
    protected $fillabe = ['user_id','nome', 'descricao', 'arquivo', 'tipo', 'created_at','updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}