<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $links = ["Início","Principal"];
        return view('livewire.page.home')
        ->extends('layouts.home', ['titulo_pagina' => 'Início', 'links' => $links])
        ->section('body');
    }
}
