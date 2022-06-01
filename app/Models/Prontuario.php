<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    //tabela
    protected $table = 'prontuarios';
    //pra inserção em massa
    protected $guarded = [];
}
