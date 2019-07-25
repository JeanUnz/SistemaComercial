@extends('layouts.admin')
@section('contenido')


<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8  col-xs-12">
        <h3>
            Listado de Ventas
            <a href="venta/create"><button class="btn btn-success">Nuevo</button> </a>
        </h3>
        <!--//se incluye la vista search.blade.php-->

        @include('venta.venta.buscar')
    </div><!-- //14:01 7-36-->
</div>


<div class="row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed  table-hover  ">
                <thead>
                    <tr class="danger">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                @foreach($venta as $venta)
                <tr>
                    <td>{{$venta->idarticulo}}</td>
                    <td>{{$venta->nombre}}</td>
                    <td>{{$venta->codigo}}</td>
                    <td>{{$venta->categoria}}</td>
                    <td>{{$venta->stock}}</td>
                    <td>{{$venta->estado}}</td>
                    <td>{{$venta->descripcion}}</td>
                    <td>
                        <a href="{{route('venta.edit',$venta->idventa)}}">
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </a>
                        <a href="" data-target="#modal-delete-{{$venta->idventa}}" data-toggle="modal">
                            <button class="btn btn-danger" >Eliminar</button>

                        </a>
                    </td>
                </tr>
                 @include("venta.venta.modal")
                @endforeach

            </table>
        </div>
        {{$venta->render()}}
    </div>

</div>


@endsection
