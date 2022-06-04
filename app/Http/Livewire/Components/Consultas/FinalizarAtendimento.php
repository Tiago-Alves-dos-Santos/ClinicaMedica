<?php

namespace App\Http\Livewire\Components\Consultas;

use Livewire\Component;
use App\Models\ClienteConsulta;

class FinalizarAtendimento extends Component
{
    public $consulta_id =0;
    protected $listeners = [
        'finalizarAtendimento.setConsultaId' => 'setConsultaId',
    ];

    public function setConsultaId($value)
    {
        $this->consulta_id = $value;
    }
    public function finalizar()
    {
        $retorno = ClienteConsulta::where('id', $this->consulta_id)->update([
            'hora_final' => date('H:i:s'),
            'status' => 'realizada'
        ]);


        redirect()->route('view.consultas.dashboard');

    }
    public function render()
    {
        return view('livewire.components.consultas.finalizar-atendimento');
    }
}
