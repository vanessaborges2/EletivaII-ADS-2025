<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";
    public $incrementing = true;

    protected $fillable = ['nome', 'valor'];
}
