<?php

namespace App\Http\Livewire\Components\Consultas;

use Livewire\Component;
use App\Models\ClienteConsulta;
use App\Http\Classes\Configuracao;

class Table extends Component
{
    public function render()
    {
        return view('livewire.components.consultas.table',[
            'consultas' => ClienteConsulta::JOIN("clientes", "clientes.id","=","cliente_consultar.cliente_id")
            ->JOIN("medicos", "medicos.id","=","cliente_consultar.medico_id")
            ->JOIN("agendamento_cliente", "agendamento_cliente.id","=","cliente_consultar.agendamento_id")
            ->select('cliente_consultar.*','medicos.nome as medico_nome','clientes.nome as cliente_nome')
            ->paginate(Configuracao::$LIMITE_PAGINA)
        ]);
    }
}
