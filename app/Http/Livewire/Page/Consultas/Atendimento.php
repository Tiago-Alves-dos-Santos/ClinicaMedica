<?php

namespace App\Http\Livewire\Page\Consultas;

use Livewire\Component;

class Atendimento extends Component
{
    public function render()
    {
        $links = ["Consultas","Atendimento"];
        return view('livewire.page.consultas.atendimento')
        ->extends('layouts.home', ['titulo_pagina' => 'Prontuário', 'links' => $links])
        ->section('body');
    }
}
