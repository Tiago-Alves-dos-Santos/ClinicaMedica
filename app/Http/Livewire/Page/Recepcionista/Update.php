<?php

namespace App\Http\Livewire\Page\Recepcionista;

use Livewire\Component;

class Update extends Component
{
    public $id_recepcionista = null;
    public function mount($id)
    {
        $this->id_recepcionista = $id;
    }
    public function render()
    {
        $links = ["Funcionários","Recepcionista", "Editar"];
        return view('livewire.page.recepcionista.update',[
            "id" => $this->id_recepcionista
        ])
        ->extends('layouts.home', ['titulo_pagina' => 'Editar Recepcionista', 'links' => $links])
        ->section('body');
    }
}
