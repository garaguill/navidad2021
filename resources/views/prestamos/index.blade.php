@extends('layouts.app2')

@section("contenido")
<a href="{{route('prestamos.create')}}" class="btn btn-success">+ Insertar</a>

<h1>Prestamos</h1>
<table id="tabla" style="text-align: center;">
	<thead>
		<tr>
        <th>Socio</th>
        <th>Libro</th>
        <th>Inicio</th>
        <th>Final</th>
		<th>E-mail </th>
        <th>Borrar</th>
		<th>Editar</th>
	</tr>
	</thead>
	<tbody>
	@foreach($prestamos as $prestamo)
		<tr data-id="{{$prestamo->id}}">
			<td>{{$prestamo->socio->nombre}}</td>
			<td>{{$prestamo->libro->titulo}}</td>
			<td>{{$prestamo->f_inicial}}</td>
            <td>{{$prestamo->f_final}}</td>
			<td><a href="/email">Notificar al usuario</a>

            <td><img class='btn_borrar' width="32px" src="https://image.flaticon.com/icons/png/512/1017/1017479.png"></td>
			<td><a href='{{"prestamos/$prestamo->id/edit"}}'><img class='btn_editar' width="32px" src="https://static.vecteezy.com/system/resources/previews/001/204/710/non_2x/pencil-png.png"></a></td>
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
			  title: '¿Estás seguro que quieres borrar este prestamo?',
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
					url		: "/prestamos/"+id,
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







