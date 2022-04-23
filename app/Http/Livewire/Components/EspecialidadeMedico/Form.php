<?php

namespace App\Http\Livewire\Components\EspecialidadeMedico;

use Livewire\Component;
use App\Models\EspecialidadeMedico;

class Form extends Component
{
    public $id_medico = 0;
    public function mount($id_medico)
    {
        $this->id_medico = $id_medico;
    }
    public function render()
    {
        return view('livewire.components.especialidade-medico.form',[
            'especialidades_not_inclusas' => EspecialidadeMedico::especialidadesMedico($this->id_medico, false, false)
        ]);
    }
}
