@extends('layouts.admin')
@section('contenido')
<h3> Listado de Articulos</h3>
 
 @if($conexion==1)
        <div class="row">
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading" style="background-color:#2874a6 !important;color:#FBF8F8;">
                        <b> .. CONSULTA RENIEC .. </b>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('consultar.reniec')}}" method="get" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">NUMERO DNI:</label>

                                <div class="col-md-5">
                                    <input id="dni" type="text" class="form-control" name="dni" value="" placeholder="Escribe DNI" required autofocus maxlength="8" />
                                </div>
                                <div class="
                                        col-md-3"></div>

                                <button type="submit" class="btn btn-success" id="btnbuscar">
                                    <i class="fa fa-search"></i> Buscar RENIEC
                                </button>

                            </div>


                        </form>
                    </div>

                </div>
            </div>
   


            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading" style="background-color:#2874a6 !important;color:#FBF8F8;">
                        <b> .. CONSULTA SUNAT .. </b>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('consultar.sunat')}}" method="get" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">NUMERO RUC:</label>

                                <div class="col-md-5">
                                    <input id="ruc" type="text" class="form-control" name="ruc" value="" placeholder="Escribe RUC" required autofocus maxlength="13" />
                                </div>
                                <div class="
                                            col-md-3"></div>

                                <button type="submit" class="btn btn-success" id="btnbuscar">
                                    <i class="fa fa-search"></i> Buscar en SUNAT
                                </button>

                            </div>


                        </form>
                    </div>

                </div>
            </div>
       </div>
    </div>   
      
 @endif
 @if($conexion==0)
  <h3>
           
       <a href="cliente/create"><button class="btn btn-success">Nuevo Cliente </button> </a>
         
            
  </h3>
 @endif
<div>
  @include('venta.cliente.buscar')
</div>

<div class="row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed  table-hover  ">
                <thead>
                    <tr class="danger">
                        <th>Nombre</th>
                        <th>Número Doc.</th>
                        <th>Teléfono</th>
                        <th>Lugar de Procedencia</th>
                        
                        <th>Opciones</th>
                    </tr>
                </thead>
                @foreach($cliente as $cli)
                <tr>
                     <td>{{$cli->nombre."  ".$cli->apellido}}</td>
                     <td>{{$cli->num_documento}}</td>
                    <td>{{$cli->telefono}}</td>
                    <td>{{$cli->distrito."  ".$cli->provincia."  ".$cli->departamento}}</td>
                   
                    <td>
                        <a href="{{route('cliente.edit',$cli->idcliente)}}">
                            <button class="btn btn-primary" type="submit">
                            <i class="fa fa-edit"></i> Editar
                            </button>
                        </a>
                        <a href="" data-target="#modal-delete-{{$cli->idcliente}}" data-toggle="modal">
                            <button class="btn btn-danger">
                            <i class="fa fa-trash"></i> Eliminar
                            </button>

                        </a>
                    </td>
                </tr>
                @include('venta.cliente.modal')
                @endforeach

            </table>
        </div>
        {{$cliente->render()}}
    </div>

</div>






@endsection



