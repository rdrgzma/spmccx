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
        Schema::create('autorizacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('cadastro_id')->nullable();
            $table->enum('autorizacao', ['Capão da Canoa', 'Xangri-lá','pendente'])->default('pendente');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cadastro_id')->references('id')->on('cadastros');
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
        Schema::dropIfExists('autorizacoes');
    }
};