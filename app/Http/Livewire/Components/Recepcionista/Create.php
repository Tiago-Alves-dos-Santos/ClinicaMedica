<?php

namespace App\Http\Livewire\Components\Recepcionista;

use Livewire\Component;
use App\Models\Recepcionista;
use Livewire\WithFileUploads;
use App\Http\Classes\Configuracao;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;
    public $login = '';
    public $senha = '';
    public $nome = '';
    public $rg = '';
    public $cpf = '';
    public $salario_fixo = null;
    public $status_opcoes = ["empregado","demitido"];
    public $status_trabalho = "empregado";
    public $data_admicao = null;
    public $data_pagamento = null;
    public $data_nascimento = null;
    public $perfil_foto = null;

    //atributo para saber se vai ser cadastro ou atualização
    public $id_recepcionista = 0;

    public $toast_type = ['success' => 0,'info' => 1,'warning' => 2,'error' => 3];
    public $msg_toast = [
        "title" => '',
        "information" => '',
        "type" => 1,
        "time" => Configuracao::TIME_TOAST
    ];
    public $limpa = '';
    protected $listeners = [
        'recepcionistas-reload' => '$refresh',
    ];
    protected $rules = [
        'login' => 'required|min:5|regex:/^([a-zA-Z ])*$/',
        'senha' => 'required|min:5',
        'nome' => 'required|min:4',
        'rg' => 'required',
        'cpf' => 'required|min:14|max:14',
        'salario_fixo' => 'required',
        'data_admicao' => 'required|date',
        'data_pagamento' => 'required|date',
        'data_nascimento' => 'required|date'
    ];
    protected $messages = [
        'login.regex' => 'O login nãp pode conter numeros!',
    ];
    public function mount($id = 0)
    {
        $this->id_recepcionista = $id;
        if($this->id_recepcionista <= 0){ //cadastro
            $this->data_admicao = date('Y-m-d');
            $this->data_pagamento = date('Y-m-d');
        }else{ //atualizar
            $recepcionista = Recepcionista::find($this->id_recepcionista);
            $this->login = $recepcionista->login;
            $this->senha = base64_decode($recepcionista->senha);
            $this->nome = $recepcionista->nome;
            $this->rg = $recepcionista->rg;
            $this->cpf = $recepcionista->cpf;
            $this->status_trabalho = $recepcionista->status_trabalho;
            $this->salario_fixo = Configuracao::getDbMoney($recepcionista->salario_fixo);
            $this->data_admicao = $recepcionista->data_admicao;
            $this->data_pagamento = $recepcionista->data_pagamento;
            $this->data_nascimento = $recepcionista->data_nascimento;
            $this->perfil_foto = $recepcionista->perfil_foto;
        }
    }
    public function cadastrar()
    {
        $this->validate();
        try {
            if($this->validateCpf()){
                //verficar se existe algum login ja cadastrado
                if(!Recepcionista::loginExists($this->login)){

                    $recepcionista = Recepcionista::create([
                        "nome" => mb_strtoupper($this->nome),
                        "cpf" => $this->cpf,
                        "rg" => $this->rg,
                        "login" => mb_strtoupper($this->login),
                        "senha" => base64_encode($this->senha),
                        "data_admicao" => $this->data_admicao,
                        "data_pagamento" => $this->data_pagamento,
                        "data_nascimento" => $this->data_nascimento,
                        "salario_fixo" => Configuracao::convertToMoney($this->salario_fixo),
                        "status_trabalho" => $this->status_trabalho
                    ]);
                    $recepcionista = $recepcionista->fresh();
                    if(!is_null($this->perfil_foto)){
                        Recepcionista::where('id', $recepcionista->id)->update([
                            "perfil_foto" => Configuracao::PATH_PERFIL_RECEPECIONISTA."$recepcionista->id.{$this->perfil_foto->extension()}"
                        ]);
                        // $this->perfil_foto->storeAs('recepcao',"$recepcionista->id.{$this->perfil_foto->extension()}");
                        if (!File::exists(Configuracao::PATH_PERFIL_RECEPECIONISTA)){
                            mkdir(Configuracao::PATH_PERFIL_RECEPECIONISTA, 0777, true);
                        }
                        $image = Image::make($this->perfil_foto);
                        $image->resize(Configuracao::PERFIL_WIDTH, Configuracao::PERFIL_HEIGHT)
                        ->save(Configuracao::PATH_PERFIL_RECEPECIONISTA."{$recepcionista->id}.{$this->perfil_foto->extension()}");
                    }
                    $this->msg_toast['title'] = 'Sucesso!';
                    $this->msg_toast['information'] = 'Cadastro realizado com sucesso!';
                    $this->msg_toast['type'] = $this->toast_type['success'];
                    $this->emit('page.recepcionista.create_showToast', $this->msg_toast);
                    $this->resetExcept(['limpa']);
                }else{
                    $this->msg_toast['title'] = 'Atenção!';
                    $this->msg_toast['information'] = 'Cadastro negado <br> Login já existente no banco!';
                    $this->msg_toast['type'] = $this->toast_type['warning'];
                    $this->emit('page.recepcionista.create_showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }
            }
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('page.recepcionista.create_showToast', $this->msg_toast);
        }


    }

    public function atualizar()
    {
        $this->validate();
        try {
            if($this->validateCpf()){
                //verficar se existe algum login ja cadastrado
                if(!Recepcionista::loginExists($this->login,'atualizar', $this->id_recepcionista)){
                    Recepcionista::where('id', $this->id_recepcionista)->update([
                        "nome" => mb_strtoupper($this->nome),
                        "cpf" => $this->cpf,
                        "rg" => $this->rg,
                        "login" => mb_strtoupper($this->login),
                        "senha" => base64_encode($this->senha),
                        "data_admicao" => $this->data_admicao,
                        "data_pagamento" => $this->data_pagamento,
                        "data_nascimento" => $this->data_nascimento,
                        "salario_fixo" => Configuracao::convertToMoney($this->salario_fixo),
                        "status_trabalho" => $this->status_trabalho
                    ]);
                    if(!is_null($this->perfil_foto) && !is_string($this->perfil_foto)){
                        Recepcionista::where('id', $this->id_recepcionista)->update([
                            "perfil_foto" => Configuracao::PATH_PERFIL_RECEPECIONISTA."{$this->id_recepcionista}.{$this->perfil_foto->extension()}"
                        ]);
                        Storage::delete(Configuracao::PATH_PERFIL_RECEPECIONISTA."{$this->id_recepcionista}.{$this->perfil_foto->extension()}");
                        if (!File::exists(Configuracao::PATH_PERFIL_RECEPECIONISTA)){
                            mkdir(Configuracao::PATH_PERFIL_RECEPECIONISTA, 0777, true);
                        }
                        $image = Image::make($this->perfil_foto);
                        $image->resize(Configuracao::PERFIL_WIDTH, Configuracao::PERFIL_HEIGHT)
                        ->save(Configuracao::PATH_PERFIL_RECEPECIONISTA."{$this->id_recepcionista}.{$this->perfil_foto->extension()}");


                        // $this->perfil_foto->storeAs('recepcao',"{$this->id_recepcionista}.{$this->perfil_foto->extension()}");
                    }
                    $this->msg_toast['title'] = 'Sucesso!';
                    $this->msg_toast['information'] = 'Atualização salva com sucesso!';
                    $this->msg_toast['type'] = $this->toast_type['success'];
                    $this->emit('page.recepcionista.update_showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }else{
                    $this->msg_toast['title'] = 'Atenção!';
                    $this->msg_toast['information'] = 'Atualização negada <br> Login já existente no banco!';
                    $this->msg_toast['type'] = $this->toast_type['warning'];
                    $this->emit('page.recepcionista.update_showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }
            }
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
                $this->msg_toast['information'] = $e->getMessage();
                $this->msg_toast['type'] = $this->toast_type['error'];
                $this->emit('page.recepcionista.update_showToast', $this->msg_toast);
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
    public function numberFormat()
    {
        $this->salario_fixo = number_format($this->salario_fixo ?? 0, 2, ',', '.');
    }

    public function render()
    {
        return view('livewire.components.recepcionista.create');
    }
}
