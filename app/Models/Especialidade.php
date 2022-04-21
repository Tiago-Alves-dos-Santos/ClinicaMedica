<?php

namespace App\Models;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Especialidade extends Model
{
    use HasFactory;
    use SoftDeletes;
    //pra inserção em massa
    protected $guarded = [];

    public function medicos()
    {
        return $this->belongsToMany(Medico::class,'especialidade_medicos');
    }
}
