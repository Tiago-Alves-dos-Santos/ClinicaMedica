<?php

namespace App\Http\Livewire\Page\Consultas;

use Livewire\Component;
use App\Models\ClienteConsulta;
use App\Http\Classes\Configuracao;

class Atendimento extends Component
{
    public $prontuario_id = null;
    public $consulta_id = 0;
    public $idade = 0;
    //dfirença de tempo, para saber o tempo exato decorrido para iniciar contador
    public $diff_time_date = [
        'hora' => 0,
        'minuto' => 0,
        'segundo' => 0,
        'milesegundo' => 0
    ];
    public function mount($consulta_id,$status,$prontuario_id)
    {
        $datetime = new \DateTime();
        $this->consulta_id = $consulta_id;
        $this->prontuario_id = $prontuario_id;
        $consulta = ClienteConsulta::find($this->consulta_id);
        $data_consulta = new \DateTime($consulta->hora_inicio);
        $diff_date = $datetime->diff($data_consulta);
        $this->diff_time_date['hora'] = $diff_date->h;
        $this->diff_time_date['minuto'] = $diff_date->i;
        $this->diff_time_date['segundo'] = $diff_date->s;
        $this->diff_time_date['milesegundo'] = $diff_date->f;
        $this->idade = Configuracao::calcIdade($consulta->cliente->data_nascimento);
    }
    public function render()
    {
        $links = ["Consultas","Atendimento"];
        return view('livewire.page.consultas.atendimento',[
            'consulta' => ClienteConsulta::find($this->consulta_id),
        ])
        ->extends('layouts.atendimento')
        ->section('body');
    }
}
