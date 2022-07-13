<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSigTapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sig_taps', function (Blueprint $table) {
            $table->id();
            $table->string('co_grupo', 255)->nullable();
            $table->string('no_grupo', 255)->nullable();
            $table->string('co_sub_grupo', 255)->nullable();
            $table->string('no_sub_grupo', 255)->nullable();
            $table->string('co_forma_organizacao', 255)->nullable();
            $table->string('no_forma_organizacao', 255)->nullable();
            $table->string('co_procedimento', 255)->nullable();
            $table->string('no_procedimento', 255)->nullable();
            $table->integer('qt_maxima_execucao')->nullable();
            $table->integer('qt_dias_permanencia')->nullable();
            $table->string('qt_pontos', 255)->nullable();
            $table->integer('vl_idade_minima')->nullable();
            $table->integer('vl_idade_maxima')->nullable();
            $table->string('vl_servico_hospitalar', 255)->nullable();
            $table->string('vl_servico_ambulatorial', 255)->nullable();
            $table->string('vl_servico_profissional', 255)->nullable();
            $table->integer('qt_tempo_permanencia')->nullable();
            $table->integer('dt_competencia')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sig_taps');
    }
}
