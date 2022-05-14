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
    public static function disponibilidade($entidade_id,$datetime, $entidade)
    {
        $tempo_consulta = TIME_CONSULTA;
        $datetime = new \DateTime($datetime);
        $date = $datetime->format('Y-m-d');
        $hora = $datetime->format('H:i:s');
        $disponivel = true;
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
        if(!empty($agendamentos)){
            foreach($agendamentos as $value){
                if($value->status_agendamento == 'agendada' || $value->status_agendamento == 'a_confirmar'){
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
