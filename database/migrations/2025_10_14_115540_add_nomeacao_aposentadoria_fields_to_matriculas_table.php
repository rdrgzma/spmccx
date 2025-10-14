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
        Schema::table('matriculas', function (Blueprint $table) {
            // Campos para Matrícula 1
            $table->date('data_nomeacao1')->nullable()->after('data_admissao1');
            $table->string('portaria_nomeacao1')->nullable()->after('data_nomeacao1');
            $table->date('data_aposentadoria1')->nullable()->after('portaria_nomeacao1');
            $table->string('portaria_aposentadoria1')->nullable()->after('data_aposentadoria1');
            
            // Campos para Matrícula 2
            $table->date('data_nomeacao2')->nullable()->after('data_admissao2');
            $table->string('portaria_nomeacao2')->nullable()->after('data_nomeacao2');
            $table->date('data_aposentadoria2')->nullable()->after('portaria_nomeacao2');
            $table->string('portaria_aposentadoria2')->nullable()->after('data_aposentadoria2');
            
            // Campos para Matrícula 3
            $table->date('data_nomeacao3')->nullable()->after('data_admissao3');
            $table->string('portaria_nomeacao3')->nullable()->after('data_nomeacao3');
            $table->date('data_aposentadoria3')->nullable()->after('portaria_nomeacao3');
            $table->string('portaria_aposentadoria3')->nullable()->after('data_aposentadoria3');
            
            // Campos para Matrícula 4
            $table->date('data_nomeacao4')->nullable()->after('data_admissao4');
            $table->string('portaria_nomeacao4')->nullable()->after('data_nomeacao4');
            $table->date('data_aposentadoria4')->nullable()->after('portaria_nomeacao4');
            $table->string('portaria_aposentadoria4')->nullable()->after('data_aposentadoria4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriculas', function (Blueprint $table) {
             $table->dropColumn([
                'data_nomeacao1', 'portaria_nomeacao1', 'data_aposentadoria1', 'portaria_aposentadoria1',
                'data_nomeacao2', 'portaria_nomeacao2', 'data_aposentadoria2', 'portaria_aposentadoria2',
                'data_nomeacao3', 'portaria_nomeacao3', 'data_aposentadoria3', 'portaria_aposentadoria3',
                'data_nomeacao4', 'portaria_nomeacao4', 'data_aposentadoria4', 'portaria_aposentadoria4',
            ]);
        });
    }
};
