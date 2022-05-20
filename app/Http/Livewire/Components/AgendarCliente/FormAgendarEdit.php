<?php

namespace App\Http\Livewire\Components\AgendarCliente;

use App\Models\Medico;
use App\Models\Cliente;
use Livewire\Component;
use App\Models\Agendamento;
use App\Http\Classes\Configuracao;
new Configuracao();
class FormAgendarEdit extends Component
{
    public $agendamento = null;
    public $agendamento_id = 0;
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
    public $cliente_disponivel = null;
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
    public function mount($agendamento_id)
    {
        $this->agendamento_id = $agendamento_id;
        $this->agendamento = Agendamento::find($this->agendamento_id);
        $this->medico_id = $this->agendamento->medico_id;
        $this->cliente_id = $this->agendamento->cliente_id;

        $datetime = new \DateTime($this->agendamento->data_consulta);
        $this->data_consulta = $datetime->format('Y-m-d\TH:i:s');

        $this->datetime_step = 60 /**equivalente aos segundos */ * TIME_CONSULTA/** tempo da consulta*/;
        $this->tempo_consulta = TIME_CONSULTA;
        $status = Configuracao::getOpcoesStatusAgendamento();
        $this->status_agendamento = mb_strtoupper($status[$this->agendamento->status_agendamento]);
    }
    /**
     * [Description for agendar]
     *
     * @return [type]
     *
     */
    public function reAgendar()
    {
        $this->validate();
        try {
            $retorno = json_decode(Agendamento::disponibilidade($this->medico_id, $this->data_consulta, 'medico','update',$this->agendamento->id));
            $this->medico_disponivel = $retorno->disponibilidade;
            $retorno = json_decode(Agendamento::disponibilidade($this->cliente_id, $this->data_consulta, 'cliente','update',$this->agendamento->id));
            $this->cliente_disponivel = $retorno->disponibilidade;
            if($this->medico_disponivel && $this->cliente_disponivel){
                Agendamento::where('id', $this->agendamento->id)->update([
                    'medico_id' => $this->medico_id,
                    'cliente_id' => $this->cliente_id,
                    'recepcionista_id' => null,
                    'data_consulta' => $this->data_consulta,
                ]);
                session([
                    'msg_toast' => [
                        'title' => 'Sucesso!',
                        'information' => 'Consulta ajustada com sucesso!',
                        'type' => $this->toast_type['success'],
                        'time' => TIME_TOAST
                    ]
                ]);
                return redirect()->route('view.agendamento.dashboard');
            }else if(!$this->medico_disponivel){
                $this->msg_toast['title'] = 'Atenção!';
                $this->msg_toast['information'] = "Impossível agendar com médico indisponivel";
                $this->msg_toast['type'] = $this->toast_type['warning'];
                $this->emit('showToast', $this->msg_toast);
            }else if(!$this->cliente_disponivel){
                $this->msg_toast['title'] = 'Atenção!';
                $this->msg_toast['information'] = "Impossível agendar com cliente indisponivel";
                $this->msg_toast['type'] = $this->toast_type['warning'];
                $this->emit('showToast', $this->msg_toast);
            }

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
        try {
            if(!empty($this->medico_id)){
                $retorno = json_decode(Agendamento::disponibilidade($this->medico_id, $this->data_consulta, 'medico','update',$this->agendamento->id));
                $this->medico_disponivel = $retorno->disponibilidade;
            }else{
                $this->msg_toast['title'] = 'Atenção!';
                $this->msg_toast['information'] = "Selecione um médico!";
                $this->msg_toast['type'] = $this->toast_type['warning'];
                $this->emit('showToast', $this->msg_toast);
            }
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('showToast', $this->msg_toast);
        }

    }
    public function render()
    {
        return view('livewire.components.agendar-cliente.form-agendar-edit', [
            'agendamento' => Agendamento::find($this->agendamento_id),
            'medicos' => Medico::orderBy('nome')->get(),
            'clientes' => Cliente::orderBy('nome')->get()
        ]);
    }
}
