<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;
    //pra inserção em massa
    protected $guarded = [];
    /**Relacionamnetos */

    /**Outros dados */
    public static function cpfExists($cpf,$operacao ='cadastro',$id=0)
    {
        $operacoes= ['cadastro','atualizar'];
        if($operacao == $operacoes[0]){
            return Cliente::where('cpf', $cpf)->exists();
        }else if($operacao == $operacoes[1] && $id == 0){
            throw new Exception("Operção de $operacao o id tem q ser maior que 0");
        }else if($operacao == $operacoes[1]){
            return Cliente::where('id','!=',$id)->where('cpf', $cpf)->exists();
        }
        else{
            throw new Exception("Operção de $operacao não encontrada!");
        }
        return Medico::where('login', $cpf)->exists();
    }
}
