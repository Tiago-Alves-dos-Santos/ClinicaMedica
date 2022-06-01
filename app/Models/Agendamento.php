<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agendamento extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'agendamento_cliente';
    //pra inserção em massa
    protected $guarded = [];
    /**Relacionamnetos */

    /**Outros dados */



    /**
     * [Description for disponibilidade]
     * Usado na hora de agendar um agendamento verficar disponibilidade de medico ou cliente
     * @param mixed $entidade_id
     * @param mixed $datetime
     * @param mixed $entidade
     *
     * @return [type]
     *
     */
    public static function disponibilidade($entidade_id,$datetime, $entidade, $action = 'create', $agendamento_id = 0)
    {
        $tempo_consulta = TIME_CONSULTA;
        $datetime = new \DateTime($datetime);
        $date = $datetime->format('Y-m-d');
        $hora = $datetime->format('H:i:s');
        $disponivel = true;
        if($action == 'create'){
            switch ($entidade) {
                case 'medico':
                    $agendamentos = Agendamento::where('medico_id', $entidade_id)
                    ->whereDate('data_consulta', $date)
                    ->whereTime('data_consulta', '=', $hora)
                    ->get();
                    break;
                case 'cliente':
                    $agendamentos = Agendamento::where('cliente_id', $entidade_id)
                    ->whereDate('data_consulta', $date)
                    ->whereTime('data_consulta', '=', $hora)
                    ->get();
                    break;
                default:
                    # code...
                    break;
            }
        }else if($action == 'update'){
            switch ($entidade) {
                case 'medico':
                    $agendamentos = Agendamento::where('id', '!=', $agendamento_id)
                    ->where('medico_id', $entidade_id)
                    ->whereDate('data_consulta', $date)
                    ->whereTime('data_consulta', '=', $hora)
                    ->get();
                    break;
                case 'cliente':
                    $agendamentos = Agendamento::where('id', '!=', $agendamento_id)
                    ->where('cliente_id', $entidade_id)
                    ->whereDate('data_consulta', $date)
                    ->whereTime('data_consulta', '=', $hora)
                    ->get();
                    break;
                default:
                    # code...
                    break;
            }
        }
        if(!empty($agendamentos)){
            foreach($agendamentos as $value){
                if($value->status_agendamento == 'agendada' || $value->status_agendamento == 'a_confirmar' || $value->status_agendamento == 'confirmada'){
                    $disponivel = false;
                }
            }
        }
        return json_encode([
            'entidade' => $entidade,
            'disponibilidade' => $disponivel
        ]);
    }
}
