<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';

    protected $primaryKey='idproveedor';

    public $timestamps=false;

    //campos que resiviran un valor para guardarse en la base de datos 4-36 6:51
    protected $fillable =[

        'nombre',
        'apellido',
       	'tipo_documento',
    	'num_documento',
        'distrito',
        'provincia',
        'departamento',
        'telefono',
        'email',
        'estado'

    ];
    //campos que no se quieren asignados al modelo
    protected $guarded =[


    ];
}
