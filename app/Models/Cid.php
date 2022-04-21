<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cid extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cid10';
    //pra inserção em massa
    protected $guarded = [];
}
