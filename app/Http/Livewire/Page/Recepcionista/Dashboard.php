<?php

namespace App\Http\Livewire\Page\Recepcionista;

use Livewire\Component;
use App\Models\Recepcionista;

class Dashboard extends Component
{
    public function render()
    {
        $links = ["Funcionários","Recepcionista"];
        return view('livewire.page.recepcionista.dashboard')
        ->extends('layouts.home', ['titulo_pagina' => 'Recepcionistas', 'links' => $links])
        ->section('body');
    }
}
