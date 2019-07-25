
@extends ('layouts.admin')
@section ('contenido')


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Proveedor:{{$proveedor->nombre}}</h3>
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

<form action="{{route('proveedor.store')}}" method="post" autocomplete="off">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">DNI</label>
            <input type="text" value="{{$proveedor->num_documento}}" name="num_documento" class="form-control" readonly="" />
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" value="{{$proveedor->nombre}}" name="nombre" class="form-control"  />
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" value="{{$proveedor->apellido}}" name="apellido" class="form-control"  />
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="distrito">Distrito</label>
            <input type="text" value="{{$proveedor->distrito}}" name="distrito" class="form-control"  />
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <!--nombre es recibido por CategoriaFormRequest en la funcion rules()-->
            <input type="text" value="{{$proveedor->provincia}}" name="provincia" class="form-control"  />
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <!--nombre es recibido por CategoriaFormRequest en la funcion rules()-->
            <input type="text" value="{{$proveedor->departamento}}" name="departamento" class="form-control" />
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="email">E MAIL</label>
            <input type="email" value="{{$proveedor->email}}" name="email" class="form-control"  />
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="email">TELEFONO</label>
            <input type="number" value="{{$proveedor->telefono}}" name="telefono"  maxlength="9" class="form-control"  />
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="tipo_documento">TIPO del DOCUMENTO</label>
            <input value="DNI" name="tipo_documento" class="form-control" values=""  />
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <input type='reset' class="btn btn-danger" value='Cancelar' onclick="location.href = '{{ route('proveedor.index')}}'" />
        </div>
    </div>
    <div>

        <input type="hidden" name="_token" value="{{csrf_token()}}" />
    </div>

</form>

    


@endsection
