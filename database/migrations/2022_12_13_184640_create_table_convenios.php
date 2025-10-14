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
        if (!Schema::hasTable('convenios')) {
            Schema::create('convenios', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('cnpj')->nullable();
                $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
                $table->string('email');
                $table->string('telefone')->nullable();
                $table->string('celular')->nullable();
                $table->string('cpf')->nullable();
                $table->enum('ativo', ['sim', 'nao'])->default('sim');
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenios');
    }
};
