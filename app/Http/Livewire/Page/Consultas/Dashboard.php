<?php

namespace App\Http\Livewire\Page\Consultas;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $links = ["Consultas","Painel"];
        return view('livewire.page.consultas.dashboard')
        ->extends('layouts.home', ['titulo_pagina' => 'Consultas', 'links' => $links])
        ->section('body');
    }
}
