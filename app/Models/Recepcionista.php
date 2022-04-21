<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Recepcionista extends Model
{
    use HasFactory;
    use SoftDeletes;
    //pra inserção em massa
    protected $guarded = [];
    /**Relacionamnetos */

    /**Outros dados */
    public static function loginExists($login,$operacao ='cadastro',$id=0)
    {
        $operacoes= ['cadastro','atualizar'];
        if($operacao == $operacoes[0]){
            return Recepcionista::where('login', $login)->exists();
        }else if($operacao == $operacoes[1] && $id == 0){
            throw new Exception("Operção de $operacao o id tem q ser maior que 0");
        }else if($operacao == $operacoes[1]){
            return Recepcionista::where('id','!=',$id)->where('login', $login)->exists();
        }
        else{
            throw new Exception("Operção de $operacao não encontrada!");
        }
        return Recepcionista::where('login', $login)->exists();
    }
}
