<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    protected $table = 'operacoes';
    protected $fillable = ['TipoOperacoes_id','contas_id', 'valor'];
}
