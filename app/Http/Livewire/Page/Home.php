<?php

namespace App\Http\Livewire\Page;

use App\Models\Medico;
use Livewire\Component;
use App\Models\Agendamento;

class Home extends Component
{
    public $agendamentos_json = [];
    public function mount($agendamentos_array = 0)
    {
        $agendamentos = Agendamento::JOIN("clientes", "clientes.id","=","agendamento_cliente.cliente_id")
        ->JOIN("medicos", "medicos.id","=","agendamento_cliente.medico_id")
        ->select('*','medicos.nome as medico_nome','clientes.nome as cliente_nome')->get();
        $agendamentos_array = [];
        foreach($agendamentos as $value){
            $datetime = new \DateTime($value->data_consulta);
            $consulta_inicio = $datetime->format('Y-m-d\TH:i:s');
            $datetime->modify('+30 min');
            $consulta_fim = $datetime->format('Y-m-d\TH:i:s');

            $this->agendamentos_json[] = [
                'title' => $value->cliente_nome." as ".date('H:i', strtotime($value->data_consulta)),
                'start' => strtotime($consulta_inicio),
                'end' => strtotime($consulta_fim)
            ];
        }
        $this->agendamentos_json = json_encode($this->agendamentos_json);
        $this->agendamentos_json = \str_replace("[","",$this->agendamentos_json);
        $this->agendamentos_json = \str_replace("]","",$this->agendamentos_json);
        // dd($this->agendamentos_json);
    }
    public function render()
    {
        $links = ["Início","Principal"];
        return view('livewire.page.home',[
            'medicos' => Medico::orderBy('nome')->get(),
            'agendamentos' => Agendamento::JOIN("clientes", "clientes.id","=","agendamento_cliente.cliente_id")
            ->JOIN("medicos", "medicos.id","=","agendamento_cliente.medico_id")
            ->select('*','medicos.nome as medico_nome','clientes.nome as cliente_nome')->get()
        ])
        ->extends('layouts.home', ['titulo_pagina' => 'Início', 'links' => $links])
        ->section('body');
    }
}
