@extends('layouts.admin')
@section('contenido')


<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8  col-xs-12">
        <h3>
            Listado de Articulos
            <a href="articulo/create"><button class="btn btn-success">Nuevo</button> </a>
        </h3>
        <!--//se incluye la vista search.blade.php-->

        @include('almacen.articulo.buscar')
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
                @foreach($articulos as $art)
                <tr>
                    <td>{{$art->idarticulo}}</td>
                    <td>{{$art->nombre}}</td>
                    <td>{{$art->codigo}}</td>
                    <td>{{$art->categoria}}</td>
                    <td>{{$art->stock}}</td>
                    <td>{{$art->estado}}</td>
                    <td>{{$art->descripcion}}</td>
                    <td>
                        <a href="{{route('articulo.edit',$art->idarticulo)}}">
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </a>
                        <a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal">
                            <button class="btn btn-danger" >Eliminar</button>

                        </a>
                    </td>
                </tr>
                 @include("almacen.articulo.modal")
                @endforeach

            </table>
        </div>
        {{$articulos->render()}}
    </div>

</div>






@endsection



