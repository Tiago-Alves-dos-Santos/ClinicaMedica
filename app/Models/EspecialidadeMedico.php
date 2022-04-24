<?php

namespace App\Models;

use App\Models\Especialidade;
use App\Models\EspecialidadeMedico;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EspecialidadeMedico extends Model
{
    use HasFactory;
    use SoftDeletes;
    //protected $table = 'especialidade_medicos';
    //pra inserção em massa
    protected $guarded = [];

    //functions

    /**
     * [Description for especialidadesMedico]
     * Retorna id ou um objeto da epecialidades inclusas ou não inclusas no medico
     *
     * @param mixed $id_medico
     * @param bool $inclusas - retornar inclusas?
     * @param bool $arr - retornar array?
     *
     * @return [type]
     *
     */
    public static function especialidadesMedico($id_medico, $inclusas = true, $arr = false)
    {
        $especidades_inclusas = EspecialidadeMedico::where('medico_id', $id_medico)->get('especialidade_id');
        if($inclusas){
            if(!$arr){
                return Especialidade::whereIn('id', $especidades_inclusas)->orderBy('nome')->get();
            }
            return $especidades_inclusas;
        }else{
            if($arr){
                return Especialidade::whereNotIn('id', $especidades_inclusas)->get('id');
            }
            return  Especialidade::whereNotIn('id', $especidades_inclusas)->orderBy('nome')
            ->get();
        }
    }

}
