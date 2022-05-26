<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Dispositivos extends Model
{
    protected $fillable = ['_id', 'chave', 'dispositivo','manufacturer', 'ativo',  'codvend'];
}

