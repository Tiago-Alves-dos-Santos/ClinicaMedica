<?php

namespace App\Http\Livewire\Page\Cliente;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {

        $links = ["Inicio","Cliente", "Cadastrar"];
        return view('livewire.page.cliente.create')
        ->extends('layouts.home', ['titulo_pagina' => 'Cadastrar Cliente', 'links' => $links])
        ->section('body');
    }
}
