<?php

namespace App\Http\Livewire\Components\Consultas;

use Livewire\Component;
use App\Models\Prontuario;
use App\Models\ExameFisico;

class FormProntuarioExFisico extends Component
{
    //dados prontuario
    public $prontuario_id = null;
    public $hda = "";
    public $historico_familiar = "";
    public $hpp = "";
    //dados exame fisico
    public $exame_fisico_id = null;
    public $temperatura = "";
    public $peso = "";
    public $altura = "";
    public $imc = -1;
    public $pa = "";
    public $frequencia_cardiaca = "";
    public $frequencia_respiratoria = "";
    public $saturacao_oxigenio = "";
    public $glicemia = "";

    public function mount($prontuario_id)
    {
        $this->prontuario_id = $prontuario_id;
        $this->exame_fisico_id = ExameFisico::where('prontuario_id', $prontuario_id)->first()->id;
    }

    public function updateProntuario()
    {
        Prontuario::where('id', $this->prontuario_id)->update([
            'hda' => $this->hda,
            'historico_familiar' => $this->historico_familiar,
            'hpp' => $this->hpp
        ]);
    }

    public function updateExameFisico()
    {
        ExameFisico::where('id', $this->exame_fisico_id)->update([
            'temperatura' => $this->temperatura,
            'peso' => $this->peso,
            'altura' => $this->altura,
            'pa' => $this->pa,
            'frequencia_cardiaca' => $this->frequencia_cardiaca,
            'frequencia_respiratoria' => $this->frequencia_respiratoria,
            'saturacao_oxigenio' => $this->saturacao_oxigenio,
            'glicemia' => $this->glicemia
        ]);
    }

    public function calcIMC()
    {
        $this->imc = $this->peso / ($this->altura * $this->altura);
    }

    public function render()
    {
        return view('livewire.components.consultas.form-prontuario-ex-fisico');
    }
}
