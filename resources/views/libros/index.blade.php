@extends('layouts.app2')

@section("contenido")
<a href="{{route('libros.create')}}" class="btn btn-success">+ Insertar</a>
<a href="{{route('libros.pdf')}}" class="btn btn-warning">Generar PDF</a>


<h1>Libros</h1>
<table id="tabla" style="text-align: center;">
	<thead>
		<tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Publicacion</th>
		<th>Antiguedad</th>
        <th>Editorial</th>
		<th>Disponibilidad </th>
        <th>Borrar</th>
		<th>Editar</th>
	</tr>
	</thead>
	<tbody>
	@foreach($libros as $libro)
		<tr data-id="{{$libro->id}}">
			<td>{{$libro->titulo}}</td>
			<td>{{$libro->autor->nombre}}</td>
			<td>{{$libro->f_publicacion}}</td>
			<td>{{$libro->age }}</td>
            <td>{{$libro->editorial->nombre}}</td>
			@if (($libro->disponible) == 1)
				<td> Disponible </td>
			
			@else
		
				<td> No disponible</td>
			
			@endif

            <td><img class='btn_borrar' width="32px" src="https://image.flaticon.com/icons/png/512/1017/1017479.png"></td>
			<td><a href='{{"libros/$libro->id/edit"}}'><img class='btn_editar' width="32px" src="https://static.vecteezy.com/system/resources/previews/001/204/710/non_2x/pencil-png.png"></a></td>
        </tr>
	@endforeach
	</tbody>	
</table>

<script>
	$(document).ready(function(){
		$("#tabla").DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
            rowReorder: true,
            columnDefs: [
            { orderable: true, className: 'reorder', targets: 0 },
            { orderable: false, targets: '_all' }
            ]
		});
	

	$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");
			Swal.fire({
			  title: '¿Estás seguro que quieres borrar este libro?',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Borrar',
			  cancelButtonText: 'Cancelar',
			}).then((result) => {
			  if (result.isConfirmed) {	//se pulsó el botón de confirmado
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
				$.ajax({
					method  : "POST",
					url		: "/libros/"+id,
					data    : {
						_method    : 'DELETE',
						_token  : "{{csrf_token()}}", 
					},
					success : function() {
						$tr.fadeOut()
					} 
				})	  
		  }
			})
					
		});
	});
</script>

@endsection




