<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table='configuracion';

    protected $primaryKey='idconfiguracion';

    public $timestamps=false;

    //campos que resiviran un valor para guardarse en la base de datos 4-36 6:51
    protected $fillable =[
        'nombre',
    	'valor'
        
    ];
    //campos que no se quieren asignados al modelo
    protected $guarded =[


    ];
}
