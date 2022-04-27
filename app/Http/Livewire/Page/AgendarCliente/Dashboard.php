<?php

namespace App\Http\Livewire\Page\AgendarCliente;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $links = ['Agendamento','Dashboard'];
        return view('livewire.page.agendar-cliente.dashboard')
        ->extends('layouts.home',['titulo_pagina' => 'Agendamentos', 'links' => $links])
        ->section('body');
    }
}
