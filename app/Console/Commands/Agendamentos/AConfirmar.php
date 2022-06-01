<?php

namespace App\Console\Commands\Agendamentos;

use App\Models\Agendamento;
use Illuminate\Console\Command;

class AConfirmar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agendamento:a_confirmar';

    /**
     * The console command description.
     * A regra é que o status deve mudar para a cofirmar qnd tiver faltando um dia antes e mudar para não realizado caso não confirmado e status 'a_confirmar'
     * Gerar uma notificação de agendamento a ser confirmado
     * @var string
     */
    protected $description = 'Comando para verficar se deve mudar status do agendamento ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $datetime = new \DateTime();
        $data_atual = $datetime->format('Y-m-d');
        $datetime->modify('+1 day');
        //pegar data >= hoje && data <= amanhã, data = hoje e amanhã
        $agendamentos = Agendamento::where('status_agendamento','agendada')
        ->whereDate('data_consulta', '>=', $data_atual)
        ->whereDate('data_consulta', '<=', $datetime->format('Y-m-d'))
        ->get();

        //loop necessario pois preciso do id, para gerar vinculação com notificação
        foreach($agendamentos as $value){
            Agendamento::where('id', $value->id)->update([
                'status_agendamento' => 'a_confirmar'
            ]);
        }

       $nãoRealizados =  Agendamento::where('status_agendamento','a_confirmar')
        ->whereDate('data_consulta', '<', $data_atual)
        ->orWhere(function($q) use($data_atual){
            $q->whereDate('data_consulta', $data_atual);
            $q->whereTime('data_consulta', '<', date('H:i:s'));
        })
        ->get();
        foreach($nãoRealizados as $value){
            Agendamento::where('id', $value->id)->update([
                'status_agendamento' => 'nao-realizada',
                'motivo' => 'Data do agendamento ultrapassada sem confirmamento do mesmo'
            ]);
        }
        return 1;
    }
}
