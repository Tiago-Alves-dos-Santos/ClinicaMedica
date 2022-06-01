<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProntuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cliente_id')->unsigned()->nullable();
            //queixa principal, paciente fala
            $table->text('hda')->nullable();
            $table->text('historico_familiar')->nullable();
            $table->text('historico_familiar')->nullable();
            $table->text('hpp')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');
            //foreng keys
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('exame_fisico_id')->references('id')->on('exame_fisicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prontuarios');
    }
}
