<?php

namespace App\Http\Livewire\Page\AgendarCliente;

use Livewire\Component;

class FormAgendar extends Component
{
    public function render()
    {
        $links = ['Agendamento','Agendar'];
        return view('livewire.page.agendar-cliente.form-agendar')
        ->extends('layouts.home',['titulo_pagina' => 'Novo agendamento', 'links' => $links])
        ->section('body');
    }
}
