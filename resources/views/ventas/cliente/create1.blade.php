
@extends ('layouts.admin')
@section ('contenido')

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       
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

<div class="row" >
              <h3>Nuevo Cliente Natural</h3>
        <form action="{{route('cliente.store')}}" method="post" autocomplete="off">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">DNI</label>
                    <input type="text"  name="num_documento" class="form-control" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre </label>
                    <input type="text"  name="nombre" class="form-control"  />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellido" class="form-control"  />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="distrito">Distrito</label>
                    <input type="text"  name="distrito" class="form-control"  />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <!--nombre es recibido por CategoriaFormRequest en la funcion rules()-->
                    <input type="text" name="provincia" class="form-control"  />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <!--nombre es recibido por CategoriaFormRequest en la funcion rules()-->
                    <input type="text"  name="departamento" class="form-control" />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email">E MAIL</label>
                    <input type="email"  name="email" class="form-control" placeholder="Ingrese email .." />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email">TELEFONO</label>
                    <input type="number" value="" name="telefono" class="form-control" placeholder="Ingrese telefono .." />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="tipo_documento">TIPO del DOCUMENTO</label>
                    <input value="DNI" name="tipo_documento" class="form-control" values="" />
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <input type='reset' class="btn btn-danger" value='Cancelar' onclick="location.href = '{{ route('cliente.index')}}'" />
                </div>
            </div>
            <div>

                <input type="hidden" name="_token" value="{{csrf_token()}}" />
            </div>

        </form>

  </div>
  

       <h3>Nuevo Cliente Juridico</h3>
        <form action="{{route('cliente.store')}}" method="post" autocomplete="off">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="num_documento">RUC</label>
                    <input type="number"  name="num_documento" class="form-control"  />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre del la Empresa </label>
                    <input type="text"  name="nombre" class="form-control" />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="condicion">Condición</label>
                    <input type="text"  name="condicion" class="form-control"  />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="tipo_contribuyente">Tipo del Contribuyente</label>
                    <input type="text"  name="tipo_contribuyente" class="form-control"  />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estado_contribuyente">Estado del Contribuyente</label>
                    <!--nombre es recibido por CategoriaFormRequest en la funcion rules()-->
                    <input type="text" name="estado_contribuyente" class="form-control"  />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="domicilio">Ubicacion</label>
                    <!--nombre es recibido por CategoriaFormRequest en la funcion rules()-->
                    <input type="text"  name="distrito" class="form-control"  />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email">E MAIL</label>
                    <input type="email"  name="email" class="form-control" placeholder="Ingrese email .." />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email">TELEFONO</label>
                    <input type="number" name="telefono" class="form-control" placeholder="Ingrese telefono .." />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="tipo_documento">TIPO del DOCUMENTO</label>
                    <input value="RUC" name="tipo_documento" class="form-control" values=""  />
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <input type='reset' class="btn btn-danger" value='Cancelar' onclick="location.href = '{{ route('cliente.index')}}'" />
                </div>
            </div>
            <div>

                <input type="hidden" name="_token" value="{{csrf_token()}}" />
            </div>

 



@endsection
