<?php

namespace App\Http\Livewire\Page\Cliente;

use Livewire\Component;

class Update extends Component
{
    public $id_cliente = 0;
    public function mount($id)
    {
        $this->id_cliente = $id;
    }
    public function render()
    {
        $links = ["Inicio","Cliente", "Atualizar"];
        return view('livewire.page.cliente.update',[
            'id_cliente' => $this->id_cliente
        ])
        ->extends('layouts.home', ['titulo_pagina' => 'Atualizar Cliente', 'links' => $links])
        ->section('body');
    }
}
