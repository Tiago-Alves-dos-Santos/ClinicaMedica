<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExameFisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exame_fisicos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prontuario_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');
            //foreng keys
            $table->foreign('prontuario_id')->references('id')->on('prontuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exame_fisicos');
    }
}
