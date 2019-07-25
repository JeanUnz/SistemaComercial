@extends('layouts.admin')
@section('contenido')


<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8  col-xs-12">
        <h3>
            Listado de Ventas
            <a href="venta/create"><button class="btn btn-success">Nuevo</button> </a>
        </h3>
        <!--//se incluye la vista search.blade.php-->
        @include('ventas.venta.buscar')
    </div><!-- //14:01 7-36-->
</div>


<div class="row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed  table-hover  ">
                <thead>
                    <tr class="danger">
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Comprobante</th>
                        <th>Impuesto</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                @foreach($ventas as $venta)
                <tr>
                    <td>{{$venta->fecha_hora}}</td>  
                    <td>{{$venta->nombre}}</td>                                     
                    <td>{{$venta->tipo_comprobante.': '.$venta->serie_comprobante. '-'.$venta->num_comprobante}}</td>
                    <td>{{$venta->impuesto}}</td>
                    <td>{{$venta->total_venta}}</td>
                    <td>{{$venta->estado}}</td>

                    <td>
                        <a href="{{route('venta.show',$venta->idventa)}}">
                           <button class="btn btn-primary" type="submit">
                            <i class="fa fa-edit"></i>Detalles
                            </button>
                        </a>

                         <a href="" data-target="#modal-delete-{{$venta->idventa}}" data-toggle="modal">
                            <button class="btn btn-danger">
                            <i class="fa fa-trash"></i> Eliminar
                            </button>
                        </a>

                    </td>
                </tr>
                 @include("ventas.venta.modal")
                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection
