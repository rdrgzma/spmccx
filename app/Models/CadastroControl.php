<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastroControl extends Model
{
    use HasFactory;
    protected $table = 'cadastro_control';
    protected $fillable = ['user_id','cadastro_id','is_complete','origem'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cadastro()
    {
        return $this->belongsTo(Cadastro::class);
    }

}
