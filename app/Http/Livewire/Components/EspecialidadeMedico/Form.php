<?php

namespace App\Http\Livewire\Components\EspecialidadeMedico;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Classes\Configuracao;
use App\Models\EspecialidadeMedico;
new Configuracao();
class Form extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_medico = 0;
    public $especialidade = []; //recebe um array de inputs checkbox
    public $search = '';
    public $toast_type = ['success' => 0,'info' => 1,'warning' => 2,'error' => 3];
    public $msg_toast = [
        "title" => '',
        "information" => '',
        "type" => 1,
        "time" => TIME_TOAST
    ];
    public $limpa = '';
    protected $listeners = [
        'especialidade-medico-form-reload' => '$refresh',
    ];
    public function mount($id_medico)
    {
        $this->id_medico = $id_medico;
    }

    public function vincular()
    {
        try{
            foreach($this->especialidade as $especialidade){
                EspecialidadeMedico::create([
                    'medico_id' => $this->id_medico,
                    'especialidade_id' => $especialidade
                ]);
            }
            $this->emit('especialidade-medico-form-reload');
            $this->emit('especialidade-medico-reload');
            $this->emit('page.medico.update_closeModalVincularEspecialidade');
            $this->emit('showToast', $this->msg_toast);
            $this->especialidade = [];
        }catch(\Exception $e){
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('showToast', $this->msg_toast);
        }
    }

    public function render()
    {
        return view('livewire.components.especialidade-medico.form',[
            'especialidades_not_inclusas' => EspecialidadeMedico::especialidadesMedico($this->id_medico, false, false, $this->search)
        ]);
    }
}
