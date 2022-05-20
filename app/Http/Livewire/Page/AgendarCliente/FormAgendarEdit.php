<?php

namespace App\Http\Livewire\Page\AgendarCliente;

use Livewire\Component;

class FormAgendarEdit extends Component
{
    public $agendamento_id = 0;
    public function mount($agendamento_id)
    {
        $this->agendamento_id = $agendamento_id;
    }
    public function render()
    {
        $links = ['Agendamento','Editar'];
        return view('livewire.page.agendar-cliente.form-agendar-edit')
        ->extends('layouts.home', ['titulo_pagina' => 'Reajustar agendamento', 'links' => $links])
        ->section('body');
    }
}
