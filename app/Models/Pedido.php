<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $guarded = ['id'];
    public function relProducto()
    {
        return $this->belongsTo(Producto::class,"producto_id","id");
    }
    public function relUser()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
    public function relMetodoDePago()
    {
        return $this->belongsTo(MetodoDePago::class,"metodo_de_pago_id","id");
    }
    
}
