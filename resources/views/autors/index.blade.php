@extends('layouts.app2')

@section("contenido")
<a href="{{route('autores.create')}}" class="btn btn-success">+ Insertar</a>
<h1>Autores</h1>
<table id="tabla" style="text-align: center;">
	<thead>
		<tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Nacimiento</th>
		<th>Libros Totales</th>
        <th>Borrar</th>
		<th>Editar</th>
	</tr>
	</thead>
	<tbody>
	@foreach($autors as $autor)
		<tr data-id="{{$autor->id}}">
			<td>{{$autor->nombre}}</td>
			<td>{{$autor->apellidos}}</td>
			<td>{{$autor->f_nacimiento}}</td>
			<td class='show_libros'>{{$autor->libros->count()}} </td> 
			
            <td><img class='btn_borrar' width="32px" src="https://image.flaticon.com/icons/png/512/1017/1017479.png"></td>
			<td><a href='{{"autores/$autor->id/edit"}}'><img class='btn_editar' width="32px" src="https://static.vecteezy.com/system/resources/previews/001/204/710/non_2x/pencil-png.png"></a></td>        </tr>
		
		
	@endforeach
	</tbody>

</table>
<div class="modal fade" id="libros_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Libros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal_body" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



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
		$(".show_libros").click(function(){
            const AutorId=$(this).closest("tr").data("id");
            $.ajax({
                url    : "{{url('/libros/listado')}}/"+AutorId,
                success: function(datos){
					console.log(datos[1].getNombre);
					let htmlTable="<table class='table table-bordered table-striped'>";
					htmlTable+="<tr><th>Titulo</th><th>Publicacion</th><th>Editorial</th></tr>"
                    $("#modal_body").html("");
                    for(let i=0;i<datos.length;i++){
						htmlTable+=`<tr>
						<td>${datos[i].titulo}</td>
						<td>${datos[i].f_publicacion}</td>
						<td>${datos[i].Nombre}</td>
						</tr>`;
                    }
					htmlTable+="</table>";
                    $("#modal_body").append(htmlTable);
                    $("#libros_modal").modal();


                }
            })    
        })

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
					url		: "/autores/"+id,
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