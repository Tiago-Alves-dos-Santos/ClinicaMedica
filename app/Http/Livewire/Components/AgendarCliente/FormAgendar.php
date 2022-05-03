<?php

namespace App\Http\Livewire\Components\AgendarCliente;

use Livewire\Component;

class FormAgendar extends Component
{
    public $medico_id = 0;
    public $data_consulta = "";
    public function mount($medico_id=0,$data_consulta = "")
    {
        $this->medico_id = $medico_id;
        $this->data_consulta = substr($data_consulta, 0, 10);
        $datetime = new \DateTime($this->data_consulta);
        $datetime->setTime(date('H'), date('i'));
        $this->data_consulta = $datetime->format('Y-m-d\TH:i:s');

    }
    public function render()
    {
        return view('livewire.components.agendar-cliente.form-agendar');
    }
}
