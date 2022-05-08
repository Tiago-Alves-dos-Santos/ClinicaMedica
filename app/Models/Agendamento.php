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
    public static function disponibilidadeMedico($medico_id,$datetime)
    {
        try {
            $tempo_consulta = TIME_CONSULTA;
            $datetime = new \DateTime($datetime);
            $date = $datetime->format('Y-m-d');
            $hora = $datetime->format('H:i:s');
            $disponivel = true;
            $agendamentos = Agendamento::where('medico_id', $medico_id)
            ->whereDate('data_consulta', $date)
            ->whereTime('data_consulta', '=', $hora)
            ->get();
            if(!empty($agendamentos)){
                foreach($agendamentos as $value){
                    if($value->status_agendamento == 'agendada' || $value->status_agendamento == 'a_confirmar'){
                        $disponivel = false;
                    }
                }
            }
            return $disponivel;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
