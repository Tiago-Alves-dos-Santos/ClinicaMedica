<?php

namespace App\Http\Livewire\Page\AgendarCliente;

use Livewire\Component;

class FormAgendar extends Component
{
    public $medico_id = 0;
    public $data_consulta = "";
    public function mount($medico_id=0,$data="")
    {
        $this->medico_id = $medico_id;
        $this->data_consulta = $data;
    }
    public function render()
    {
        $links = ['Agendamento','Agendar'];
        return view('livewire.page.agendar-cliente.form-agendar')
        ->extends('layouts.home',['titulo_pagina' => 'Novo agendamento', 'links' => $links])
        ->section('body');
    }
}
