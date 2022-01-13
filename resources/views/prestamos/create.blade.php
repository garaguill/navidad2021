@extends("layouts.app2")


@section("contenido")

	<h3>Formulario para @if (isset($prestamo)) actualizar @else insertar @endif</h3>

    

<form method="POST" action="{{isset($prestamo)?route("prestamos.update",[$prestamo->id]):route("prestamos.store")}}">

  <div class="form-group">
    <label for="codigo">Libro</label>
    <select name="libro_id" id="input" class="form-control">
      <option value="">--Escoja el libro--</option>
    @foreach($libros as $libro)
    <option value="{{ $libro ['id' ] }}" {{$prestamo->libro_id==$libro->id?'selected':''}}>{{ $libro['titulo'] }} </option>

      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="codigo">Socio </label>
    <select name="socio_id" id="input" class="form-control">
      <option value="">--Escoja al socio--</option>
    @foreach($socios as $socio)
    <option value="{{ $socio ['id' ] }}" {{$prestamo->socio_id==$socio->id?'selected':''}}>{{ $socio['nombre'] }} {{ $socio['apellidos'] }} </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="codigo">Fecha Inicial</label>
    <input type="date" class="form-control" id="f_inicial" name="f_inicial"  value='{{$prestamo->f_inicial??''}}'>
    </div>

    <div class="form-group">
    <label for="codigo">Fecha Final</label>
    <input type="date" class="form-control" id="f_final" name="f_final"  value='{{$prestamo->f_final??''}}'>
  </div>
	
	@csrf
	
	@if (isset($prestamo))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($prestamo)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('prestamos.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection