<?php

namespace App\Http\Livewire\Page\Cliente;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $links = ["Inicio","Cliente"];
        return view('livewire.page.cliente.dashboard')
        ->extends('layouts.home', ['titulo_pagina' => 'Clientes', 'links' => $links])
        ->section('body');
    }
}
