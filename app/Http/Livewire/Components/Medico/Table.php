<?php

namespace App\Http\Livewire\Components\Medico;

use App\Models\Medico;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.components.medico.table',[
            'medicos' => Medico::get()
        ]);
    }
}
