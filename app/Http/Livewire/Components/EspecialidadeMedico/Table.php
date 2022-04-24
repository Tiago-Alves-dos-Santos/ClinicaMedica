<?php

namespace App\Http\Livewire\Components\EspecialidadeMedico;

use Livewire\Component;
use App\Models\EspecialidadeMedico;

class Table extends Component
{
    public $id_medico = 0;
    public function mount($id_medico)
    {
        $this->id_medico = $id_medico;
    }
    protected $listeners = [
        'especialidade-medico-reload' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.components.especialidade-medico.table',[
            'especialidades_inclusas' => EspecialidadeMedico::especialidadesMedico($this->id_medico, true, false)
        ]);
    }
}
