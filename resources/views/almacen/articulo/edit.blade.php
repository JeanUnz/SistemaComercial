@extends ('layouts.admin')
@section ('contenido')
<!--8-36 2:33-->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Articulo:{{$articulo->nombre}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
           
    </div>

 <form action="{{route('articulo.update',$articulo->idarticulo)}}" method="post" autocomplete="off">
    @method('put')
    <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre </label>
                    <!--nombre es recibido por CategoriaFormRequest en la funcion rules() 8-36 8:08 y tambien sera usado por CategoriaController en el metodo store() -->
                    <input type="text" value="{{$articulo->nombre}}" name="nombre" class="form-control" placeholder="Nombre.." />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label>Categoria</label>
                        <select name="idcategoria" class="form-control"><!--con el name se valida en el ArticuloFormRequest-->
							    <!--voy a recibir todas las categorias en una variable $categorias desde el metodo create de ArticuloController-->
							    @foreach ($categorias as $cat)
								@if ($cat->idcategoria==$articulo->idcategoria)
								<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option><!--muestra la categoria seleccionada cuando coincida con la uqe trae puesta el articulo-->
								@else
								<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
								@endif
							@endforeach
						    </select>
                </div>
            </div>

             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" value="{{$articulo->codigo}}" name="codigo" class="form-control" placeholder="Codigo del artículo.." />
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" value="{{$articulo->stock}}" name="stock" class="form-control" placeholder="Cantidad del articulo" />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text"value="{{$articulo->descripcion}}" name="descripcion" class="form-control" placeholder="Descripcion.." />
                </div>
            </div>
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <input type='reset' class="btn btn-danger" value='Cancelar' onclick="location.href = '{{ route('articulo.index')}}'" />
                </div>
            </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
           </div>
</form>


    


@endsection
