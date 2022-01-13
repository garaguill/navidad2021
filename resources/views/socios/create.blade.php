@extends("layouts.app2")

@section("contenido")

	<h3>Formulario para @if (isset($socio)) actualizar @else insertar @endif</h3>

<form method="POST" action="{{isset($socio)?route("socios.update",[$socio->id]):route("socios.store")}}">
  <div class="form-group">
    <label for="codigo">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$socio->nombre??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Apellido </label>
    <input type="text" class="form-control" id="apellidos" name="apellidos"  value='{{$socio->apellidos??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Email</label>
    <input type="text" class="form-control" id="email" name="email"  value='{{$socio->email??''}}'>
    </div>
    <div class="form-group">
    <label for="codigo">Fecha Alta </label>
    <input type="date" class="form-control" id="f_alta" name="f_alta"  value='{{$socio->f_alta??''}}'>
  </div>
	
	@csrf
	
	@if (isset($socio))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($socio)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('socios.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection