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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('cadastro_id')->nullable();
            $table->string('matricula1')->nullable();
            $table->enum('cidade1', ['Capão da Canoa', 'Xangri-lá'])->nullable();
            $table->date('data_admissao1')->nullable();
            $table->string('matricula2')->nullable();
            $table->enum('cidade2', ['Capão da Canoa', 'Xangri-lá'])->nullable();
            $table->date('data_admissao2')->nullable();
            $table->string('matricula3')->nullable();
            $table->enum('cidade3', ['Capão da Canoa', 'Xangri-lá'])->nullable();
            $table->date('data_admissao3')->nullable();
            $table->string('matricula4')->nullable();
            $table->enum('cidade4', ['Capão da Canoa', 'Xangri-lá'])->nullable();
            $table->date('data_admissao4')->nullable();
            $table->string('turnos')->nullable();
            $table->string('cargo')->nullable();
            $table->string('tel_comercial')->nullable();
            $table->string('email_comercial')->nullable();
            $table->string('funcao')->nullable();
            $table->string('area')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cadastro_id')->references('id')->on('cadastros');
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
        Schema::dropIfExists('matriculas');
    }
};