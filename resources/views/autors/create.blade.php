@extends("layouts.app2")


@section("contenido")

	<h3>Formulario para @if (isset($autor)) actualizar @else insertar @endif</h3>

    

<form method="POST" action="{{isset($autor)?route("autores.update",[$autor->id]):route("autores.store")}}">
  <div class="form-group">
    <label for="codigo">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$autor->nombre??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Apellido </label>
    <input type="text" class="form-control" id="apellidos" name="apellidos"  value='{{$autor->apellidos??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Fecha Nacimiento</label>
    <input type="date" class="form-control" id="f_nacimiento" name="f_nacimiento"  value='{{$autor->f_nacimiento??''}}'>
    </div>
    
  </div>
	
	@csrf
	
	@if (isset($autor))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($autor)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('autores.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection