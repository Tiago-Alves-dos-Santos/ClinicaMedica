<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255)->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('rg', 255)->nullable();
            $table->string('perfil_foto', 255)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
        // DB::statement("ALTER TABLE clientes ADD perfil_foto MEDIUMBLOB after data_nascimento");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
