<?php

namespace App\Http\Livewire\Components\AgendarCliente;

use App\Models\Medico;
use App\Models\Cliente;
use Livewire\Component;
use App\Models\Agendamento;
use App\Http\Classes\Configuracao;
//start contantes
new Configuracao();
class FormAgendar extends Component
{
    public $medico_id = null;
    public $data_consulta = "";
    public $cliente_id = null;
    public $recepcionista_id = null;
    public $status_agendamento = null;
    public $status_agendamento_opcoes =  ['agendada', 'cancelada','confirmada','realizada','a_confirmar'];
    //step de tempo de consulta
    public $datetime_step = 0;
    public $tempo_consulta = 0;
    //varivel que verifica disponibilidade de agendar consulta
    public $medico_disponivel = null;
    public $toast_type = ['success' => 0,'info' => 1,'warning' => 2,'error' => 3];
    public $msg_toast = [
        "title" => '',
        "information" => '',
        "type" => 1,
        "time" => TIME_TOAST
    ];
    public $limpa = '';
    protected $rules = [
        'medico_id' => 'required|numeric',
        'data_consulta' => 'required|date',
        'cliente_id' => 'required|numeric'
    ];
    protected $messages = [
        'medico_id.required' => 'O campo médico é obrigatório',
        'medico_id.numeric' => 'O campo médico tem q ter valor numérico',
        'cliente_id.required' => 'O campo paciente é obrigatório',
        'cliente_id.numeric' => 'O campo paciente tem q ter valor numérico',
    ];

    public function mount($medico_id=0,$data_consulta = "")
    {
        $this->medico_id = ($medico_id <= 0)?null:$medico_id;
        $this->data_consulta = substr($data_consulta, 0, 10);
        $datetime = new \DateTime($this->data_consulta);
        $datetime->setTime(date('H'), date('i'));
        $this->data_consulta = $datetime->format('Y-m-d\TH:i:s');

        $this->datetime_step = 60 /**equivalente aos segundos */ * TIME_CONSULTA/** tempo da consulta*/; //nesse caso step de segundos para minutos
        $this->tempo_consulta = TIME_CONSULTA;
    }

    /**
     * [Description for agendar]
     *
     * @return [type]
     *
     */
    public function agendar()
    {
        $this->validate();
        try {
            Agendamento::create([
                'medico_id' => $this->medico_id,
                'cliente_id' => $this->cliente_id,
                'recepcionista_id' => null,
                'data_consulta' => $this->data_consulta,
            ]);
            session([
                'msg_toast' => [
                    'title' => 'Sucesso!',
                    'information' => 'Consulta agendada com sucesso!',
                    'type' => $this->toast_type['success'],
                    'time' => TIME_TOAST
                ]
            ]);
            return redirect()->route('view.agendamento.dashboard');
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('showToast', $this->msg_toast);
        }
    }

    /**
     * [Description for disponibilidade]
     * Verficar disponibilidade de medico, colocar media de tempo de uma consulta
     * @return [type]
     *
     */
    public function disponibilidade()
    {
        $tempo_consulta = TIME_CONSULTA;
        $medico_id = $this->medico_id;
        $datetime = new \DateTime($this->data_consulta);
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

        $this->medico_disponivel = $disponivel;
    }

    public function render()
    {
        return view('livewire.components.agendar-cliente.form-agendar',[
            'clientes' => Cliente::orderBy('nome')->get(),
            'medicos' => Medico::orderBy('nome')->get()
        ]);
    }
}
