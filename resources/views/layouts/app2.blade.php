<link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
	body {
        border: 4px solid black;
        margin: 40px;
        padding: 40px;
        border-radius: 20px
}
</style>

<nav class="navbar navbar-light bg-light justify-content-between">
  <img src="https://image.flaticon.com/icons/png/512/23/23358.png" width="100px" height="100px">
  <a href="/autores">Autores</a>
  <a href="/socios">Socios</a>
  <a href="/libros">Libros</a>
  <a href="/prestamos">Prestamos</a>
  <a href="/editoriales">Editoriales</a>
</nav>

<div class="container">
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@yield("contenido")
</div>



