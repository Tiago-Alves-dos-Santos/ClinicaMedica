<?php

namespace App\Http\Livewire\Components\AgendarCliente;

use Livewire\Component;
use App\Models\Agendamento;
use App\Http\Classes\Configuracao;

class Table extends Component
{
    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.components.agendar-cliente.table', [
            'agendamentos' => Agendamento::JOIN("clientes", "clientes.id","=","agendamento_cliente.cliente_id")
            ->JOIN("medicos", "medicos.id","=","agendamento_cliente.medico_id")
            ->select('*','medicos.nome as medico_nome','clientes.nome as cliente_nome')->paginate(Configuracao::$LIMITE_PAGINA)
        ]);
    }
}
