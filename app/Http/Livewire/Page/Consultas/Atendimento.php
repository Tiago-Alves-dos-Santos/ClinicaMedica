<?php

namespace App\Http\Livewire\Page\Consultas;

use Livewire\Component;
use App\Models\ClienteConsulta;
use App\Http\Classes\Configuracao;

class Atendimento extends Component
{
    public $consulta_id = 0;
    public $idade = 0;
    public function mount($consulta_id)
    {
        $this->consulta_id = $consulta_id;
        $consulta = ClienteConsulta::find($this->consulta_id);
        $this->idade = Configuracao::calcIdade($consulta->cliente->data_nascimento);
    }
    public function render()
    {
        $links = ["Consultas","Atendimento"];
        return view('livewire.page.consultas.atendimento',[
            'consulta' => ClienteConsulta::find($this->consulta_id)
        ])
        ->extends('layouts.atendimento')
        ->section('body');
    }
}
