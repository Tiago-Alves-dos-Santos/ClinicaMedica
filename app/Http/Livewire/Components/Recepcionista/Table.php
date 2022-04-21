<?php

namespace App\Http\Livewire\Components\Recepcionista;

use Livewire\Component;
use App\Models\Recepcionista;

class Table extends Component
{
    protected $listeners = [
        'recepcao-reload' => '$refresh',
    ];

    public function reload()
    {
        $this->emit('recepcao-reload');
    }
    public function render()
    {
        return view('livewire.components.recepcionista.table',[
            'recepcionistas' => Recepcionista::get()
        ]);
    }
}
