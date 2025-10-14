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
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nome');
            $table->date('data_associacao')->default(now());
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('mae');
            $table->string('pai')->nullable();
            $table->string('rg');
            $table->string('cpf');
            $table->string('pis')->nullable();
            $table->date('data_nascimento');
            $table->enum('sexo', ['masculino', 'feminino']);
            $table->enum('estado_civil', ['solteiro(a)', 'casado(a)', 'divorciado(a)', 'viuvo(a)']);
            $table->string('nacionalidade')->default('brasileiro(a)')->nullable();
            $table->string('naturalidade');
            $table->enum('ativo', ['sim', 'nao'])->default('sim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadastros');
    }
};
