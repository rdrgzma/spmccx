<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('data_associacao')->nullable();
            $table->enum('role', ['Administrador(a)', 'Associado(a)', 'Convenio'])->default('Associado(a)');
            $table->enum('status', ['Ativo', 'Inativo', 'Aguardando', 'Pendente'])->default('Aguardando');
            $table->string('telefone')->nullable();
            $table->foreignId('cadastro_id')->nullable();
            $table->boolean('has_cadastro_completo')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
