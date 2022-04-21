<?php

namespace App\Http\Livewire\Page\Medico;

use Livewire\Component;

class Update extends Component
{
    public $id_medico = 0;
    public function mount($id)
    {
        $this->id_medico = $id;
    }
    public function render()
    {
        $links = ["Funcionários","Médico", "Atualizar"];
        return view('livewire.page.medico.update',[
            'id' => $this->id_medico
        ])
        ->extends('layouts.home', ['titulo_pagina' => 'Atualizar Médico', 'links' => $links])
        ->section('body');
    }
}
