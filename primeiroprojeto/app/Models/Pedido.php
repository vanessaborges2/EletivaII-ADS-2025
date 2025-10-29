<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    public $incrementing = true;

    protected $fillable = ['status', 'total', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function itens()
    {
        return $this->hasMany(ItensPedido::class, 'pedido_id');
    }
}
