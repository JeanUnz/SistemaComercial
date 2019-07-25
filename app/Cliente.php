<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

    protected $primaryKey='idcliente';

    public $timestamps=false;

    //campos que resiviran un valor para guardarse en la base de datos 
    protected $fillable =[
        //datos de clinentes naturales
       	'nombre',
        'apellido',
       	'tipo_documento',
    	'num_documento',
        'distrito',
        'provincia',
        'departamento',
        'telefono',
        'email',
        'estado',
        //clientes juridicas
        'condicion',
        'tipo_contribuyente',
        'estado_contribuyente',



               
    ];
    //campos que no se quieren asignados al modelo
    protected $guarded =[


    ];
}
