<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agendamento extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'agendamento_cliente';
    //pra inserção em massa
    protected $guarded = [];
    /**Relacionamnetos */

    /**Outros dados */
}
