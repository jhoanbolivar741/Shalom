<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $table = 'calificaciones';
    protected $guarded = ['id'];
    public function relProducto()
    {
        return $this->belongsTo(Producto::class,"producto_id","id");
    }
}
