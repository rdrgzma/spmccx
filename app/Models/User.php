<?php

namespace App\Models;

use App\Models\Cadastro;
use App\Models\CadastroControl;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'data_associacao',
        'telefone',
        'cadastro_id',
        'has_cadastro_completo',
        'origem',
        'created_at',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function cadastro()
    {
        return $this->hasOne(Cadastro::class);
    }
    public function dependente()
    {
        return $this->hasMany(Dependente::class);
    }
    public function hasCadastro()
    {
        return $this->cadastro()->exists();
    }
    public function isAdmin()
    {
        return $this->role === 'Administrador(a)';
    }
    public function matricula()
    {
        return $this->hasMany(Matricula::class);
    }
    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function autorizacao()
    {
        return $this->hasMany(Autorizacao::class);
    }

    public function documento()
    {
        return $this->hasOne(Documento::class);
    }
    public function isConvenio()
    {
        return $this->role === 'Convenio';
    }

}
