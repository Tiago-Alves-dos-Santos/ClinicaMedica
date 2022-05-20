<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_consultar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('medico_id')->unsigned()->nullable();
            $table->bigInteger('cliente_id')->unsigned()->nullable();
            $table->bigInteger('agendamento_id')->unsigned()->nullable();
            $table->double('valor', 15, 2)->nullable();
            $table->dateTime('data_consulta')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->enum('status', ['iniciada', 'realizada','aguardando'])->default('aguardando');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');
            /**chaves estrangeiras */
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('agendamento_id')->references('id')->on('agendamento_cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_consultar');
    }
}
