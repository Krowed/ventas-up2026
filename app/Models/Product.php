<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table        = 'products';
    protected $primaryKey   = 'id';

    protected $fillable =
    [
        'codigo_interno',
        'codigo_barras',
        'codigo_sunat',
        'descripcion',
        'idmarca',
        'idcategoria',
        'idunidad',
        'idcodigo_igv',
        'igv',
        'precio_compra',
        'precio_venta',
        'impuesto',
        'fecha_vencimiento',
        'opcion',
        'stock_actual'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'idmarca');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'idcategoria');
    }
}
