<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_nombre', 'producto_id', 'cantidad'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
