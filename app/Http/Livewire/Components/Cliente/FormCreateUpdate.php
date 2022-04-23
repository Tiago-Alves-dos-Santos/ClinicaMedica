<?php

namespace App\Http\Livewire\Components\Cliente;

use App\Models\Cliente;
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
    public $id_cliente = null;
    public $nome = '';
    public $cpf = '';
    public $rg = '';
    public $perfil_foto = null;
    public $data_nascimento = null;
    public $toast_type = ['success' => 0,'info' => 1,'warning' => 2,'error' => 3];
    public $msg_toast = [
        "title" => '',
        "information" => '',
        "type" => 1,
        "time" => TIME_TOAST
    ];
    public $limpa = '';
    protected $listeners = [
        'cliente-reload' => '$refresh',
    ];
    protected $rules = [
        'nome' => 'required|min:4',
        'cpf' => 'required|min:14|max:14',
        'data_nascimento' => 'required'
    ];
    public function mount($id = 0)
    {
        $this->id_cliente = $id;
        if($this->id_cliente == 0){

        }else{
            $cliente = Cliente::find($this->id_cliente);
            $this->nome = $cliente->nome;
            $this->cpf = $cliente->cpf;
            $this->rg = $cliente->rg;
            $this->data_nascimento = $cliente->data_nascimento;
            $this->perfil_foto = $cliente->perfil_foto;
        }
    }

    public function cadastrar()
    {
        $this->validate();
        try {
            if($this->validateCpf()){
                //verficar se existe algum login ja cadastrado
                if(!Cliente::cpfExists($this->cpf)){

                    $cliente = Cliente::create([
                        "nome" => mb_strtoupper($this->nome),
                        "cpf" => $this->cpf,
                        "rg" => $this->rg,
                        "data_nascimento" => $this->data_nascimento,
                    ]);
                    $cliente = $cliente->fresh();
                    if(!is_null($this->perfil_foto)){
                        Cliente::where('id', $cliente->id)->update([
                            "perfil_foto" => "$cliente->id.{$this->perfil_foto->extension()}"
                        ]);
                        if (!File::exists(PATH_PERFIL_CLIENTE)){
                            mkdir(PATH_PERFIL_CLIENTE, 0777, true);
                        }

                        // $this->perfil_foto->storeAs('recepcao',"$recepcionista->id.{$this->perfil_foto->extension()}");

                        $image = Image::make($this->perfil_foto);
                        $image->resize(PERFIL_WIDTH, PERFIL_HEIGHT)
                        ->save(PATH_PERFIL_CLIENTE."{$cliente->id}.{$this->perfil_foto->extension()}");
                    }
                    $this->msg_toast['title'] = 'Sucesso!';
                    $this->msg_toast['information'] = 'Cadastro realizado com sucesso!';
                    $this->msg_toast['type'] = $this->toast_type['success'];
                    $this->emit('showToast', $this->msg_toast);
                    $this->resetExcept(['limpa']);
                }else{
                    $this->msg_toast['title'] = 'Atenção!';
                    $this->msg_toast['information'] = 'Cadastro negado <br> Login já existente no banco!';
                    $this->msg_toast['type'] = $this->toast_type['warning'];
                    $this->emit('showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }
            }
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
            $this->msg_toast['information'] = $e->getMessage();
            $this->msg_toast['type'] = $this->toast_type['error'];
            $this->emit('showToast', $this->msg_toast);
        }
    }

    public function atualizar()
    {
        $this->validate();
        try {
            if($this->validateCpf()){
                //verficar se existe algum login ja cadastrado
                if(!Cliente::cpfExists($this->cpf,'atualizar', $this->id_cliente)){
                    Cliente::where('id', $this->id_cliente)->update([
                        "nome" => mb_strtoupper($this->nome),
                        "cpf" => $this->cpf,
                        "rg" => $this->rg,
                        "data_nascimento" => $this->data_nascimento,
                    ]);
                    if(!is_null($this->perfil_foto) && !is_string($this->perfil_foto)){
                        Cliente::where('id', $this->id_cliente)->update([
                            "perfil_foto" => "{$this->id_cliente}.{$this->perfil_foto->extension()}"
                        ]);
                        Storage::delete(PATH_PERFIL_CLIENTE."{$this->id_cliente}.{$this->perfil_foto->extension()}");
                        if (!File::exists(PATH_PERFIL_CLIENTE)){
                            mkdir(PATH_PERFIL_CLIENTE, 0777, true);
                        }
                        $image = Image::make($this->perfil_foto);
                        $image->resize(PERFIL_WIDTH, PERFIL_HEIGHT)
                        ->save(PATH_PERFIL_CLIENTE."{$this->id_cliente}.{$this->perfil_foto->extension()}");


                        // $this->perfil_foto->storeAs('recepcao',"{$this->id_recepcionista}.{$this->perfil_foto->extension()}");
                    }
                    $this->msg_toast['title'] = 'Sucesso!';
                    $this->msg_toast['information'] = 'Atualização salva com sucesso!';
                    $this->msg_toast['type'] = $this->toast_type['success'];
                    $this->emit('showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }else{
                    $this->msg_toast['title'] = 'Atenção!';
                    $this->msg_toast['information'] = 'Atualização negada <br> Login já existente no banco!';
                    $this->msg_toast['type'] = $this->toast_type['warning'];
                    $this->emit('showToast', $this->msg_toast);
                    $this->reset(['msg_toast']);
                }
            }
        } catch (\Exception $e) {
            $this->msg_toast['title'] = 'Erro!';
                $this->msg_toast['information'] = $e->getMessage();
                $this->msg_toast['type'] = $this->toast_type['error'];
                $this->emit('showToast', $this->msg_toast);
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
    public function render()
    {
        return view('livewire.components.cliente.form-create-update');
    }
}
