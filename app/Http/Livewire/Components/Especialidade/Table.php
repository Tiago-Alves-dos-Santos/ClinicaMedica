<?php

namespace App\Http\Livewire\Components\Especialidade;

use Livewire\Component;
use App\Models\Especialidade;
use App\Http\Classes\Configuracao;
//start constantes
new Configuracao();
class Table extends Component
{
    public $id_especialidade = 0;
    public $nome = '';
    public $toast_type = ['success' => 0,'info' => 1,'warning' => 2,'error' => 3];
    public $msg_toast = [
        "title" => '',
        "information" => '',
        "type" => 1,
        "time" => TIME_TOAST
    ];
    public $limpa = '';
    //salvar fa-solid fa-floppy-disk
    public $itemAction = "fa-solid fa-plus";
    public $textAction = 'Cadastrar';
    public $search_value = '';
    protected $listeners = [
        'specialty-reload' => '$refresh',
        'clickRowTable'
    ];
    protected $rules = [
        'nome' => 'required|min:5',
    ];

    public function mount()
    {
        # code...
    }

    public function cancelAction()
    {
        if($this->id_especialidade > 0){
            $this->emit('components.especialidade.table_clickRowTable', $this->id_especialidade, false);
            $this->resetExcept(['limpa']);
        }
    }

    //verficar ação do botão
    public function verifyActionButton()
    {
        if(empty($this->nome)){
            $this->msg_toast['title'] = 'Sucesso!';
            $this->msg_toast['information'] = 'Informe um nome para o cadastro!';
            $this->msg_toast['type'] = $this->toast_type['warning'];
            $this->emit('showToast', $this->msg_toast);
            $this->resetExcept(['limpa']);
        }else{
            if($this->id_especialidade > 0){
                $this->updated();
            }else{
                $this->created();
            }
            $this->reload();
            $this->resetExcept(['limpa']);
        }
    }

    public function created()
    {
        Especialidade::create([
            "nome" => mb_strtoupper($this->nome)
        ]);
    }

    public function updated()
    {
        Especialidade::where('id', $this->id_especialidade)->update([
            "nome" => mb_strtoupper($this->nome)
        ]);
    }
    public function deleted()
    {
        # code...
    }

    public function clickRowTable($id)
    {
        $this->id_especialidade = $id;
        $this->nome = Especialidade::find($this->id_especialidade)->nome;
        //salvar fa-solid fa-floppy-disk
        $this->itemAction = "fa-solid fa-floppy-disk";
        $this->textAction = 'Salvar';
        $this->emit('components.especialidade.table_clickRowTable', $this->id_especialidade, true);
    }

    public function reload()
    {
        $this->emit('specialty-reload');
    }

    public function search()
    {
        if(!empty($this->nome)){
            $this->search_value = $this->nome;
        }else{
            $this->search_value = '';
        }
    }

    public function render()
    {
        return view('livewire.components.especialidade.table',[
            'especialidades' => Especialidade::where('nome','like',"%".$this->search_value."%")->get()
        ]);
    }
}
