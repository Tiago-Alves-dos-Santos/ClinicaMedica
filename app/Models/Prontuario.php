<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prontuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    //tabela
    protected $table = 'prontuarios';
    //pra inserção em massa
    protected $guarded = [];
}
