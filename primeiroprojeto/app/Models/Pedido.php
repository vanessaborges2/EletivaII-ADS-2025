<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    public $incrementing = true;

    protected $fillable = ['status', 'total'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
