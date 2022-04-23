<?php

namespace App\Http\Livewire\Components\Medico;
use App\Models\Medico;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Classes\Configuracao;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
//start contantes
new Configuracao();
class FormCreateUpdate extends Component
{
    use WithFileUploads;
    public $id_medico = 0;
    public $nome = '';
    public $crm = '';
    public $cpf ='';
    public $rg = '';
    public $senha = '';
    public $data_admicao = '';
    public $data_pagamento = '';
    public $data_nascimento = '';
    public $status_opcoes = ["empregado","demitido"];
    public $status_trabalho = "empregado";
    public $perfil_foto = null;

    public $limpa = '';
    public $toast_type = ['success' => 0,'info' => 1,'warning' => 2,'error' => 3];
    public $msg_toast = [
        "title" => '',
        "information" => '',
        "type" => 1,
        "time" => 5000
    ];
    protected $listeners = [
        'medico-reload' => '$refresh',
    ];
    protected $rules = [
        'crm' => 'required|min:3',
        'senha' => 'required|min:5',
        'nome' => 'required|min:4',
        'cpf' => 'required|min:14|max:14',
        'data_admicao' => 'required|date',
        'data_pagamento' => 'required|date',
        'data_nascimento' => 'required|date'
    ];
    public function mount($id = 0)
    {
        $this->id_medico = $id;
        if($this->id_medico <= 0){
            $this->data_admicao = date('Y-m-d');
            $this->data_pagamento = date('Y-m-d');
        }else{
            $medico = Medico::find($this->id_medico);
            $this->nome = $medico->nome;
            $this->crm = $medico->crm;
            $this->senha = base64_decode($medico->senha);
            $this->cpf = $medico->cpf;
            $this->rg = $medico->rg;
            $this->data_admicao = $medico->data_admicao;
            $this->data_pagamento = $medico->data_pagamento;
            $this->data_nascimento = $medico->data_nascimento;
            $this->status_trabalho = $medico->status_trabalho;
            $this->perfil_foto = $medico->perfil_foto;
        }
    }
    public function validateCpf()
    {
        if(!Configuracao::validarCPF($this->cpf)){
            $this->addError('cpf', 'CPF inválido!');
            return false;
        }else{
           $this->resetValidation('cpf');
           return true;
        }
    }
    public function cadastrar()
    {

        $this->validate();
        try {
            if($this->validateCpf()){
                if(!Medico::loginExists($this->crm,'cadastro')){
                    $medico = Medico::create([
                        "nome" => mb_strtoupper($this->nome),
                        "crm" => $this->crm,
                        "cpf" => $this->cpf,
                        "rg" => $this->rg,
                        "senha" => base64_encode($this->senha),
                        "status_trabalho" => $this->status_trabalho,
                        "data_admicao" => $this->data_admicao,
                        "data_pagamento" => $this->data_pagamento,
                        "data_nascimento" => $this->data_nascimento
                    ]);
                    $medico = $medico->fresh();
                    if(!is_null($this->perfil_foto)){
                        Medico::where('id', $medico->id)->update([
                            "perfil_foto" => "$this->id_medico.{$this->perfil_foto->extension()}"
                        ]);

                        if (!File::exists(PATH_PERFIL_MEDICO)){
                            mkdir(PATH_PERFIL_MEDICO, 0777, true);
                        }
                        // $this->perfil_foto->storeAs('medico',"$.{$this->perfil_foto->extension()}");
                        $image = Image::make($this->perfil_foto);
                        $image->resize(PERFIL_WIDTH, PERFIL_HEIGHT)
                        ->save(PATH_PERFIL_MEDICO."$medico->id.{$this->perfil_foto->extension()}");
                    }
                    $this->msg_toast['title'] = 'Sucesso!';
                    $this->msg_toast['information'] = 'Cadastro realizado com sucesso!';
                    $this->msg_toast['type'] = $this->toast_type['success'];
                    $this->emit('page.medico.create_showToast', $this->msg_toast);
                    $this->resetExcept(['limpa']);
                }else{
                    $this->msg_toast['title'] = 'Atenção!';
                    $this->msg_toast['information'] = "Cadastro negado <br> CRM: {$this->crm} já existente no banco!";
                    $this->msg_toast['type'] = $this->toast_type['warning'];
                    $this->emit('page.medico.create_showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }
            }
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('page.medico.create_showToast', $this->msg_toast);
        }
    }

    public function atualizar()
    {
        $this->validate();
        try {
            if($this->validateCpf()){
                if(!Medico::loginExists($this->crm,'atualizar', $this->id_medico)){
                    Medico::where('id', $this->id_medico)->update([
                        "nome" => mb_strtoupper($this->nome),
                        "crm" => $this->crm,
                        "cpf" => $this->cpf,
                        "rg" => $this->rg,
                        "senha" => base64_encode($this->senha),
                        "status_trabalho" => $this->status_trabalho,
                        "data_admicao" => $this->data_admicao,
                        "data_pagamento" => $this->data_pagamento,
                        "data_nascimento" => $this->data_nascimento
                    ]);
                    if(!is_null($this->perfil_foto)  && !is_string($this->perfil_foto)){
                        Medico::where('id', $this->id_medico)->update([
                            "perfil_foto" => "$this->id_medico.{$this->perfil_foto->extension()}"
                        ]);
                        Storage::delete(PATH_PERFIL_MEDICO."{$this->id_medico}.{$this->perfil_foto->extension()}");
                        if (!File::exists(PATH_PERFIL_MEDICO)){
                            mkdir(PATH_PERFIL_MEDICO, 0777, true);
                        }
                        $image = Image::make($this->perfil_foto);
                        $image->resize(PERFIL_WIDTH, PERFIL_HEIGHT)
                        ->save("storage/medico/"."$this->id_medico.{$this->perfil_foto->extension()}");

                        // $this->perfil_foto->storeAs('medico',"$this->id_medico.{$this->perfil_foto->extension()}");
                    }
                    $this->msg_toast['title'] = 'Sucesso!';
                    $this->msg_toast['information'] = 'Atualização realizada com sucesso!';
                    $this->msg_toast['type'] = $this->toast_type['success'];
                    $this->emit('page.medico.update_showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }else{
                    $this->msg_toast['title'] = 'Atenção!';
                    $this->msg_toast['information'] = "Atualização negada <br> CRM: {$this->crm} já existente no banco!";
                    $this->msg_toast['type'] = $this->toast_type['warning'];
                    $this->emit('page.medico.update_showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }
            }
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('page.medico.update_showToast', $this->msg_toast);
        }
    }


    public function render()
    {
        return view('livewire.components.medico.form-create-update');
    }
}
