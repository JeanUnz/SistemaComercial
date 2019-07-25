<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='venta';

    protected $primaryKey='idventa';

    public $timestamps=false;

    //campos que resiviran un valor para guardarse en la base de datos 4-36 6:51
    protected $fillable =[
    	'idclienter',
    	'tipo_comprobante',
    	'serie_comprobante',
        'num_comprobante',
        'total_venta',
    	'fecha_hora',
    	'impuesto',
    	'estado'
    ];
    //campos que no se quieren asignados al modelo
    protected $guarded =[
    ];
}
