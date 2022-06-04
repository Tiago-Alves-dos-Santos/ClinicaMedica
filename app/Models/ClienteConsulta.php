<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClienteConsulta extends Model
{
    use HasFactory;
    use SoftDeletes;
    //tabela
    protected $table = 'cliente_consultar';
    //pra inserção em massa
    protected $guarded = [];
    /**Relacionamnetos */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**Outros dados */
}
