<?php

namespace App\Http\Livewire\Page\Especialidade;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $links = ["Geral","Especialidades"];
        return view('livewire.page.especialidade.dashboard')
        ->extends('layouts.home', ['titulo_pagina' => 'Especialidades Médicas', 'links' => $links])
        ->section('body');
    }
}
