<?php

namespace App\Http\Livewire\Page\Medico;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $links = ["Funcionários","Médico", "Cadastrar"];
        return view('livewire.page.medico.create')
        ->extends('layouts.home', ['titulo_pagina' => 'Cadastrar Médico', 'links' => $links])
        ->section('body');

    }
}
