<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;

    protected $table = 'kardexes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'idproducto',
        'idalmacen',
        'tipo_movimiento',   // COMPRA | VENTA | AJUSTE | TRASLADO
        'documento',         // FACTURA | BOLETA | NOTA_VENTA | COMPRA | etc
        'iddocumento',       // id de billings, buys, sale_notes, etc
        'entrada',
        'salida',
        'stock_anterior',
        'stock_actual',
        'fecha',
        'idusuario'
    ];

    protected $casts = [
        'entrada'         => 'decimal:2',
        'salida'          => 'decimal:2',
        'stock_anterior'  => 'decimal:2',
        'stock_actual'    => 'decimal:2',
        'fecha'           => 'datetime',
    ];

    public function producto()
    {
        return $this->belongsTo(Product::class, 'idproducto');
    }

    public function almacen()
    {
        return $this->belongsTo(Warehouse::class, 'idalmacen');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idusuario');
    }
}
