<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'tarefas';

    protected $fillable = ['tarefa', 'data_limite_conclusao'];

}
