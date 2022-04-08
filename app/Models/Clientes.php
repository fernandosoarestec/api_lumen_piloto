<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['chave', 'nome'];
}
