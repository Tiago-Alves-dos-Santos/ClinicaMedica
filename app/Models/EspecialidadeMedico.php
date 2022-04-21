<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EspecialidadeMedico extends Model
{
    use HasFactory;
    use SoftDeletes;
    //protected $table = 'especialidade_medicos';
    //pra inserção em massa
    protected $guarded = [];
}
