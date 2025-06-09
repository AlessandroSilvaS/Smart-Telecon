<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contract extends Model
{

    protected $table = 'contract';

    protected $fillable = [

    'user_id',
    'team_name',
    'cnpj',
    'cidade',
    'valor',
    'vigencia_inicio',
    'vigencia_fim',
    'arquivo_path',
    ];
}
