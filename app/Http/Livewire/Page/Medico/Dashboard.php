<?php

namespace App\Http\Livewire\Page\Medico;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $links = ["Funcionários","Médicos"];
        return view('livewire.page.medico.dashboard')
        ->extends('layouts.home', ['titulo_pagina' => 'Médicos', 'links' => $links])
        ->section('body');
    }
}
