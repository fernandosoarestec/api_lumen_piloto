<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = ['nomeusu', 'senha'];
}