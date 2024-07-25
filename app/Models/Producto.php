<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $guarded = ['id'];
    public function relCategoria()
    {
        return $this->belongsTo(Categoria::class,"categoria_id","id");
    }
}
