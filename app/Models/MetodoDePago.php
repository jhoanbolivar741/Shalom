<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoDePago extends Model
{
    use HasFactory;
    protected $table = 'metodos_de_pago';
    protected $guarded = ['id'];
    public function relPedido()
    {
        return $this->hasMany(Pedido::class,"metodo_de_pago_id","id");
    }
}