<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedorFormRequest;
use DB;
use App\Http\Requests;

use App\reniec\Reniec;
use App\reniec\curl;



class ProveedorController extends Controller
{

 public function __construct()
    {
     $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $proveedor=DB::table('proveedores')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where('estado','=','1')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->where('estado','=','1')
            ->orderBy('idproveedor','desc')
            ->paginate(7);
            return view('compra.proveedor.index',["proveedor"=>$proveedor,"searchText"=>$query]);
        }
    }

    public function create(){
        return view("venta.cliente.create");
    }

    public function store(Request $request){
        $doc=$request->get('tipo_documento');

        if($doc=='DNI'){
            $cliente=new Proveedor;
            $cliente->nombre=$request->get('nombre');
            $cliente->apellido=$request->get('apellido');
            $cliente->tipo_documento=$request->get('tipo_documento');
            $cliente->num_documento=$request->get('num_documento');
            $cliente->distrito=$request->get('distrito');
            $cliente->provincia=$request->get('provincia');
            $cliente->departamento=$request->get('departamento');
            $cliente->telefono=$request->get('telefono');
            $cliente->email=$request->get('email');
            $cliente->estado='1';
            $cliente->save();
            return Redirect::to('compra/proveedor');
        }
        else{
                $cliente=new Proveedor;
                $cliente->nombre=$request->get('nombre');
                $cliente->tipo_documento=$request->get('tipo_documento');
                $cliente->num_documento=$request->get('num_documento');
                $cliente->condicion=$request->get('condicion');
                $cliente->tipo_contribuyente=$request->get('tipo_contribuyente');
                $cliente->estado_contribuyente=$request->get('estado_contribuyente');
                $cliente->distrito=$request->get('distrito');
                $cliente->telefono=$request->get('telefono');
                $cliente->email=$request->get('email');
                $cliente->estado='1';
                $cliente->save();
                return Redirect::to('compra/proveedor');

        }

    }

    public function show($id)
    {
        return view("venta.cliente.show",["cliente"=>Cliente::findOrFail($id)]);
    }
    //funcion para  hacer la consulta al api de la reniec
    public function buscarDni(Request $request)
    {

            $dni=$request->get('dni');

            $persona = new Reniec();
            $yo = $persona->search( $dni );
            if (is_null($yo)) {
                $data=array('estado' => false);
                return Redirect::to('compra/proveedor');
            }else{
                if( $yo->success==true )
                {
                    $data=array(
                        'dni' => $yo->result->DNI,
                        'codveri' => $yo->result->CodVerificacion,
                        'nombres' => $yo->result->Nombres,
                        'apellidos' => $yo->result->Apellidos,
                        'grupovota' => $yo->result->gvotacion,
                        'distrito' => $yo->result->Distrito,
                        'provincia' => $yo->result->Provincia,
                        'departamento' => $yo->result->Departamento,
                        'estado' => $yo->success
                    );
                    $identificador='DNI';

                    return view("compra.proveedor.create",["cliente"=>$data,"Identificador"=>$identificador]);

                }else{

                    return Redirect::to('compra/proveedor');
                }

            }





    }

    function buscarRuc(Request $request)
    {
        $ruc =$request->get('ruc');
        $data = file_get_contents("https://api.sunat.cloud/ruc/".$ruc);
        $info = json_decode($data, true);

        if($data==='[]' || $info['fecha_inscripcion']==='--'){
	        $datos = array(0 => 'nada');
	        echo json_encode($datos);
        }else{
            $data = array(
                0 => $info['ruc'],
                1 => $info['razon_social'],
                2 => date("d/m/Y", strtotime($info['fecha_actividad'])),
                3 => $info['contribuyente_condicion'],
                4 => $info['contribuyente_tipo'],
                5 => $info['contribuyente_estado'],
                6 => date("d/m/Y", strtotime($info['fecha_inscripcion'])),
                7 => $info['domicilio_fiscal'],
                8 => date("d/m/Y", strtotime($info['emision_electronica']))
            );

            $identificador='RUC';
            return view("compra.proveedor.create",["cliente"=>$data,"Identificador"=>$identificador]);
        }

    }

    public function edit($id){

        return view("compra.proveedor.edit",["proveedor"=>Proveedor::findOrFail($id)]);

    }

    public function update(Request $request,$id){

        $cliente=Proveedor::findOrFail($id);

        $cliente->nombre=$request->get('nombre');
        $cliente->apellido=$request->get('apellido');
        $cliente->tipo_documento=$request->get('tipo_documento');
        $cliente->num_documento=$request->get('num_documento');
        $cliente->distrito=$request->get('distrito');
        $cliente->provincia=$request->get('provincia');
        $cliente->departamento=$request->get('departamento');
        $cliente->telefono=$request->get('telefono');
        $cliente->email=$request->get('email');
        $cliente->update();
        return Redirect::to('compra/proveedor');

    }

    public function destroy($id){

        $cliente=Proveedor::findOrFail($id);
        $cliente->estado='0';
        $cliente->update();

        return Redirect::to('compra/proveedor');

    }









}
