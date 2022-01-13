@extends("layouts.app2")
@section("contenido")
	<h3>Formulario para @if (isset($libro)) actualizar @else insertar @endif</h3>
<form method="POST" action="{{isset($libro)?route("libros.update",[$libro->id]):route("libros.store")}}">
  <div class="form-group">
    <label for="codigo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo"  value='{{$libro->titulo??''}}'>
  </div>

  <div class="form-group">
    <label for="codigo">Autor</label>
    <select name="autor_id" id="input" class="form-control">
      <option value="">--Escoja el autor--</option>

    @foreach($autores as $autor)
      <option value="{{ $autor ['id' ] }}" {{$libro->autor_id==$autor->id?'selected':''}}>{{ $autor['nombre'] }} {{$autor['apellidos']}} </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="codigo">Fecha Publicacion</label>
    <input type="date" class="form-control" id="f_publicacion" name="f_publicacion"  value='{{$libro->f_publicacion??''}}'>
    </div>
    
    <div class="form-group">
    <label for="codigo">Editorial</label>
    <select name="editorial_id" id="input" class="form-control">
      <option value="">--Escoja la editorial--</option>

    @foreach($editoriales as $editorial)
    <option value="{{ $editorial ['id' ] }}" {{$libro->editorial_id==$editorial->id?'selected':''}}>{{ $editorial['nombre'] }} </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="codigo">Disponibilidad </label>
    <input type="checkbox" class="form-control" id="disponible" name="disponible"  {{$libro->disponible?'checked=checked':''}}'>
  </div>
	
	@csrf
	
	@if (isset($libro))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($libro)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('libros.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection