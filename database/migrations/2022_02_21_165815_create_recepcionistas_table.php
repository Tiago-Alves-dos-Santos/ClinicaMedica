<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecepcionistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcionistas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255)->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('rg', 255)->nullable();
            $table->string('login', 255)->nullable();
            $table->string('senha', 255)->nullable();
            $table->date('data_admicao')->nullable();
            $table->date('data_pagamento')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->double('salario_fixo', 15, 2)->nullable();
            $table->enum('status_trabalho', ['empregado', 'demitido']);
            $table->string('perfil_foto', 255)->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
        //DB::statement("ALTER TABLE recepcionistas ADD perfil_foto MEDIUMBLOB after status_trabalho");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepcionistas');
    }
}
