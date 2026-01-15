<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleNote extends Model
{
    use HasFactory;
    protected $table        = 'sale_notes';
    protected $primaryKey   = 'id';
    protected $fillable     =
    [
        'idtipo_comprobante',
        'serie',
        'correlativo',
        'fecha_emision',
        'fecha_vencimiento',
        'hora',
        'idcliente',
        'idmoneda',
        'idpago',
        'modo_pago',
        'exonerada',
        'inafecta',
        'gravada',
        'anticipo',
        'igv',
        'gratuita',
        'otros_cargos',
        'total',
        'observaciones',
        'anulado',
        'estado',
        'idusuario',
        'idarqueocaja',
        'idfactura_anular',
        'vuelto',
        'idalmacen'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idusuario');
    }

    public function pago()
    {
        return $this->belongsTo(PayMode::class, 'idpago');
    }

    public function cliente()
    {
        return $this->belongsTo(Client::class, 'idcliente');
    }

    public function moneda()
    {
        return $this->belongsTo(Currency::class, 'idmoneda');
    }
}
