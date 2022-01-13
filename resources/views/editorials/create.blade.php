@extends("layouts.app2")


@section("contenido")

	<h3>Formulario para @if (isset($editorial)) actualizar @else insertar @endif</h3>

    

<form method="POST" action="{{isset($editorial)?route("editoriales.update",[$editorial->id]):route("editoriales.store")}}">
  <div class="form-group">
    <label for="codigo">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$editorial->nombre??''}}'>
  </div>
	
	@csrf
	
	@if (isset($editorial))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($editorial)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('editoriales.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection