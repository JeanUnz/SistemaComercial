<form action="{{route('usuario.index')}}" method="get"  role="busqueda" autocomplete="off">

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}"><!--16:14 7 CategoriaController.php esta esperando un objeto llamado searchText linea 25-->
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
			
		</span>
	</div>
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
</div>		

</form>
