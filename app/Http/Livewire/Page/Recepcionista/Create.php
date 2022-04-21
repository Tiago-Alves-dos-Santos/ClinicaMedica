<?php

namespace App\Http\Livewire\Page\Recepcionista;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $links = ["Funcionários","Recepcionista", "Cadastrar"];
        return view('livewire.page.recepcionista.create')
        ->extends('layouts.home', ['titulo_pagina' => 'Formulário Recepcionista', 'links' => $links])
        ->section('body');
    }
}
