<?php

namespace App\Http\Livewire\Components\AgendarCliente;

use Livewire\Component;
use App\Models\Agendamento;
use App\Http\Classes\Configuracao;

class Table extends Component
{
    public $agendamento_id = 0;
    public $status_agendamento = "";
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
        $this->agendamento_id = $agendamento_id;
        $agedamento = Agendamento::find($agendamento_id);
        $this->status_agendamento = $agedamento->status_agendamento;
        $this->emit('components.agendar-cliente.table_openModal');
    }

    public function showQuestionYesNo()
    {
        $status = Configuracao::getOpcoesStatusAgendamento();
        $this->emit('components.agendar-cliente.table_closeModal');
        $this->emit('components.agendar-cliente.table_showQuestionYesNo', "Deseja mesmo mudar o status do agendamento para: <span class='text-primary'>".$status[$this->status_agendamento]."</span>");
    }

    public function editStatus()
    {
        # code...
        Agendamento::where('id', $this->agendamento_id)->update([
            'status_agendamento' => $this->status_agendamento
        ]);
        $this->emit('agendamentos-reload');
        $this->emit('components.agendar-cliente.table_closeModal');
    }

    public function render()
    {
        return view('livewire.components.agendar-cliente.table', [
            'agendamentos' => Agendamento::JOIN("clientes", "clientes.id","=","agendamento_cliente.cliente_id")
            ->JOIN("medicos", "medicos.id","=","agendamento_cliente.medico_id")
            ->select('*','agendamento_cliente.id as agedamento_id','medicos.nome as medico_nome','clientes.nome as cliente_nome')->paginate(Configuracao::$LIMITE_PAGINA)
        ]);
    }
}
