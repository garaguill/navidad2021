<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<table id="tabla" class="table table-striped table-bordered">
	<thead>
		<tr><th>Titulo</th><th>Autor</th><th>Publicacion</th><th>Editorial</th><th>Disponibilidad</th></tr>
	</thead>
	<tbody>
    @foreach($libros as $libro)
		<tr data-id="{{$libro->id}}">
			<td>{{$libro->titulo}}</td>
			<td>{{$libro->autor->nombre}}</td>
			<td>{{$libro->f_publicacion}}</td>
            <td>{{$libro->editorial->nombre}}</td>
			@if (($libro->disponible) == 0)
				<td> Disponible </td>
			
			@else
				<td> No disponible</td>
			
			@endif
			</tr>
		@endforeach
	</tbody>	
</table>


