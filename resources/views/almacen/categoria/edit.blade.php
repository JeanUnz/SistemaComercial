@extends ('layouts.admin')
@section ('contenido')
<!--8-36 2:33-->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Categoría: {{$categoria->nombre}}</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!--CategoriaController, si el metodo es POST llama a la funcion store, si el metodo es path va a llamar a la funcion update, si el metodo es  delete llama a la funcion destroy-->


        <form action="{{route('categoria.update',$categoria->idcategoria)}}" method="post" autocomplete="off">
            @method('put')
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <!--nombre es recibido por CategoriaFormRequest en la funcion rules() 8-36 8:08 y tambien sera usado por CategoriaController en el metodo store() -->
                <input type="text" name="nombre" value="{{$categoria->nombre}}" class="form-control" placeholder="Nombre.." />
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <!--nombre es recibido por CategoriaFormRequest en la funcion rules()-->
                <input type="text" name="descripcion" value="{{$categoria->descripcion}}" class="form-control" placeholder="Descripcion.." />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <input type='reset' class="btn btn-danger" value='Cancelar' onclick="location.href = '{{ route('categoria.index')}}'" />
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
        </form>

        <p>
            <a href="{{route('categoria.index')}}"></a>
        </p>

    </div>
</div>

@endsection
