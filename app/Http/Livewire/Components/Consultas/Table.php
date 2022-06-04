<?php

namespace App\Http\Livewire\Components\Consultas;

use Livewire\Component;
use App\Models\ClienteConsulta;
use App\Http\Classes\Configuracao;

class Table extends Component
{
    public $cliente_id = 0;
    public function startConsulta($consulta_id)
    {
        $datetime = new \DateTime();
        ClienteConsulta::where('id', $consulta_id)->update([
            'hora_inicio' => $datetime->format('H:i:s')
        ]);
        $rota = route('view.consultas.atendimento',[
            'consulta_id' => $consulta_id
        ]);

        $this->emit('openGetRouteNewTab', $rota);

    }
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
