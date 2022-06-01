<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExameFisico extends Model
{
    use HasFactory;
    use SoftDeletes;
    //tabela
    protected $table = 'exame_fisicos';
    //pra inserção em massa
    protected $guarded = [];
}
