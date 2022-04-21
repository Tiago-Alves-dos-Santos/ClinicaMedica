<?php

namespace App\Models;

use App\Models\Especialidade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medico extends Model
{
    use HasFactory;
    use SoftDeletes;
    //pra inserção em massa
    protected $guarded = [];
    /**Relacionamnetos */
    public function especialidade()
    {
        return $this->belongsToMany(Especialidade::class,'especialidade_medicos');
    }
    /**Outros dados */
    public static function loginExists($login,$operacao ='cadastro',$id=0)
    {
        $operacoes= ['cadastro','atualizar'];
        if($operacao == $operacoes[0]){
            return Medico::where('crm', $login)->exists();
        }else if($operacao == $operacoes[1] && $id == 0){
            throw new Exception("Operção de $operacao o id tem q ser maior que 0");
        }else if($operacao == $operacoes[1]){
            return Medico::where('id','!=',$id)->where('crm', $login)->exists();
        }
        else{
            throw new Exception("Operção de $operacao não encontrada!");
        }
        return Medico::where('login', $login)->exists();
    }
}
