<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Venta;
use App\DetalleVenta;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaFormRequest;
use Carbon\Carbon;
use DB;

class VentaController extends Controller
{
    public function __construct()
    {   }

    public function index(Request $request)
    {
        if($request)
        { 
            $query=trim($request->get('searchText'));
            $ventas=DB::table('venta as v')
            ->join('persona as p','p.idpersona','=','v.idcliente')
            ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.total_venta','v.estado')
            ->where('idventa','LIKE','%'.$query.'%')
            ->where('estado','=','1')
            ->orderBy('fecha_hora','desc')
            ->paginate(10);
            return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
        }
    }
         
    public function create(){
        $personas=DB::table('persona')->where('tipo_persona','=','cliente')->get();
        $articulos=DB::table('articulo as art')
            ->join('detalle_ingreso as di','art.idarticulo','=','di.idarticulo')
            ->select(DB::raw('CONCAT(art.codigo," ",art.nombre) as articulo'), 'art.idarticulo','art.stock', DB::raw('avg(di.precio_venta)as precio_promedio'))
            ->where('art.estado','=','Activo')
            ->where('art.stock','>','0')
            ->groupBy('articulo','art.idarticulo','art.stock')
            ->get();

        return view("ventas.venta.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();


            $venta=new Venta;
          
            $venta->idcliente=$request->get('idcliente');
            $venta->tipo_comprobante=$request->get('tipo_comprobante');
            $venta->serie_comprobante=$request->get('serie_comprobante');
            $venta->num_comprobante=$request->get('num_comprobante');
            $venta->total_venta=$request->get('total_venta');

            $mytime=Carbon::now('America/Lima');
            $venta->fecha_hora=$mytime->toDateTimeString();
            $venta->impuesto='18';
            $venta->estado='1';

        
            $venta->save();

        //     dd($venta);

            $idarticulo=$request->get('idarticulo');
            $cantidad=$request->get('cantidad');
            $descuento=$request->get('descuento');
            $precio_venta=$request->get('precio_venta');

            $cont=0;

          
            while ($cont < count($idarticulo)){
            	$detalle=new DetalleVenta();
                $detalle->idventa=$venta->idventa;
                $detalle->idarticulo=$idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->descuento=$descuento[$cont];
                $detalle->precio_venta=$precio_venta[$cont];
                $detalle->save();
                $cont=$cont+1;
            }

            DB::commit();

           }catch(\Exception $e){
                DB::rollback();
            }
      
        return Redirect::to('ventas/venta');

    }

    public function show($id)
    {
        $venta=DB::table('venta as v')
        ->join('persona as p','v.idcliente','=','p.idpersona')
        ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
        ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
        ->where('v.idventa','=',$id)
        ->first();

        $detalles=DB::table('detalle_venta as detin')
        ->join('articulo as art','detin.idarticulo','=','art.idarticulo')
        ->select('art.nombre as articulo','detin.cantidad','detin.descuento','detin.precio_venta')
        ->where('detin.idventa','=',$id)
        ->get();

        return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles]);
    }


    public function edit($id){

        return view("ventas.venta.edit",["venta"=>Ventas::findOrFail($id)]);

    }

    public function update(VentaFormRequest $request,$id){
        $venta= Venta::findOrFail($id);
        $venta->idventa=$request->get('idventa');
        $venta->idcliente=$request->get('idcliente');
        $venta->tipo_comprobante=$request->get('tipo_comprobante');
        $venta->numero_comprobante=$request->get('numero_comprobante');
        $venta->fechahora=$request->get('fechahora');
        $venta->impuesto=$request->get('impuesto');
        $venta->total_venta=$request->get('total_venta');
        $venta->update();

        return Redirect::to('ventas/venta');

    }

    public function destroy($id){

        $venta=Venta::findOrFail($id);
        $venta->estado='0';
        $venta->update();
        return Redirect::to('ventas/venta');
    }
}
