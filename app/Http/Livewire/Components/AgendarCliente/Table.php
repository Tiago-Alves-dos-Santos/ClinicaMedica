<?php

namespace App\Http\Livewire\Components\AgendarCliente;

use Livewire\Component;
use App\Models\Agendamento;
use App\Models\ClienteConsulta;
use App\Http\Classes\Configuracao;
new Configuracao();
class Table extends Component
{
    public $agendamento_id = 0;
    public $status_agendamento = "";
    public $motivo = "";
    public $limpa = "";
    public $toast_type = ['success' => 0,'info' => 1,'warning' => 2,'error' => 3];
    public $msg_toast = [
        "title" => '',
        "information" => '',
        "type" => 1,
        "time" => TIME_TOAST
    ];
    protected $listeners = [
        'agendamentos-reload' => '$refresh',
        'editStatus'
    ];

    public function mount()
    {

    }

    public function openModalEditStatus($agendamento_id)
    {
        # code...
        try {
            $this->agendamento_id = $agendamento_id;
            $agedamento = Agendamento::find($agendamento_id);
            $this->status_agendamento = $agedamento->status_agendamento;
            if($this->status_agendamento != 'cancelada' || $this->status_agendamento != 'nao-realizada'){
                $this->motivo = "";
            }
            $this->emit('components.agendar-cliente.table_openModal');
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('showToast', $this->msg_toast);
        }
    }

    public function showQuestionYesNo()
    {
        try {
            $status = Configuracao::getOpcoesStatusAgendamento();
            $this->emit('components.agendar-cliente.table_closeModal');
            $this->emit('components.agendar-cliente.table_showQuestionYesNo', "Deseja mesmo mudar o status do agendamento para: <span class='text-primary'>".$status[$this->status_agendamento]."</span>");
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('showToast', $this->msg_toast);
        }
    }

    public function editStatus()
    {
        # code...
        try {
            Agendamento::where('id', $this->agendamento_id)->update([
                'status_agendamento' => $this->status_agendamento,
                'motivo' => mb_strtoupper($this->motivo)
            ]);
            if($this->status_agendamento == 'confirmada'){
                $agendamento = Agendamento::find($this->agendamento_id);
                ClienteConsulta::create([
                    'medico_id' => $agendamento->medico_id,
                    'cliente_id' => $agendamento->cliente_id,
                    'agendamento_id' => $agendamento->id,
                    'data_consulta' => $agendamento->data_consulta,
                ]);
                $this->msg_toast['title'] = 'Consulta criada!';
                $this->msg_toast['information'] = "Consulta gerada a partir de agendamento confirmado!";
                $this->msg_toast['type'] = $this->toast_type['info'];
                $this->emit('showToast', $this->msg_toast);
            }
            $this->resetExcept($this->limpa);
            $this->emit('agendamentos-reload');
            $this->emit('components.agendar-cliente.table_closeModal');
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('showToast', $this->msg_toast);
        }
    }

    public function render()
    {
        return view('livewire.components.agendar-cliente.table', [
            'agendamentos' => Agendamento::JOIN("clientes", "clientes.id","=","agendamento_cliente.cliente_id")
            ->JOIN("medicos", "medicos.id","=","agendamento_cliente.medico_id")
            ->select('agendamento_cliente.*','agendamento_cliente.id as agedamento_id','medicos.nome as medico_nome','clientes.nome as cliente_nome')
            ->paginate(Configuracao::$LIMITE_PAGINA)
        ]);
    }
}
