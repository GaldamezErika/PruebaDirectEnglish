<body>

	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Actualizar Empresa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				@foreach($empre as $em)
				<form action="" method="POST">
					@csrf
					<input type="hidden" name="id_empresa" id="id_empresa" value="{{$em->id_empresa}}">
					<div class="row">
						<div class="col">
							<label>Empresa:</label>
							<input type="text" name="empresa" id="nombre_empresa" class="form-control" value="{{$em->nombre_empresa}}">
						</div>
						<div class="col">
							<label>Dirección:</label>
							<input type="text" name="direccion" id="direccion_empresa" class="form-control" value="{{$em->direccion_empresa}}">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label>Telefono:</label>
							<input type="text" name="telefono" id="telefono_empresa" class="form-control" value="{{$em->telefono_empresa}}">
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn btn-primary" id="btnAct" value="Modificar">
					</div>
				</form>
				@endforeach
			</div>
		</div>
	</div>



    <!-- Actualizando a los empleados con AJAX Y JSON -->
	<script>

		$(document).ready(function(){


			$('#btnAct').click(function() {

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				var nombre_empresa = $('#nombre_empresa').val();
				var direccion_empresa = $('#direccion_empresa').val();
				var telefono_empresa = $('#telefono_empresa').val();
				var id_empresa = $('#id_empresa').val();

				$.ajax({
					type: 'post',
					url: "{{url('modificarEmpre')}}",
					data: {nombre_empresa: nombre_empresa,direccion_empresa: direccion_empresa,telefono_empresa: telefono_empresa, id_empresa: id_empresa},
					success: function(array){
						alert('Se modifico la empresa');

						window.location.replace("../index");
					}
				});

			});

		});		

	</script>
