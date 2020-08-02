<body>

	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Actualizar Empleado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				@foreach($emp as $em)
				<form action="" method="POST">
					@csrf
					<input type="hidden" name="id_empleado" id="id_empleado" value="{{$em->id_empleado}}">
					<div class="row">
						<div class="col">
							<label>Nombre:</label>
							<input type="text" name="nombre" id="nombre_empleado" class="form-control" value="{{$em->nombre_empleado}}">
						</div>
						<div class="col">
							<label>Apellido:</label>
							<input type="text" name="apellido" id="apellido_empleado" class="form-control" value="{{$em->apellido_empleado}}">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label>Dirección:</label>
							<input type="text" name="direccion" id="direccion_empleado" class="form-control" value="{{$em->direccion_empleado}}">
						</div>
						<div class="col">
							<label>Telefono:</label>
							<input type="text" name="telefono" id="telefono_empleado" class="form-control" placeholder="ejemplo: 0000-0000" value="{{$em->telefono_empleado}}">
						</div>
					</div>
					<br>
					<!-- Por cosas de la vida no pude mostrar el registro de la empresa del empledos :'v -->
					<div class="row">
						<div class="col">
							<label>Empresa:</label>
							<select name="empresa" id="id_empresa" class="form-control">
								<option value="">--Seleccione empresa--</option>
								@foreach($empresas as $e)
								<option value="{{$e->id_empresa}}">{{$e->nombre_empresa}}</option>
								@endforeach
							</select>
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

				var nombre_empleado = $('#nombre_empleado').val();
				var apellido_empleado = $('#apellido_empleado').val();
				var direccion_empleado = $('#direccion_empleado').val();
				var telefono_empleado = $('#telefono_empleado').val();
				var id_empresa = $('#id_empresa').val();
				var id_empleado = $('#id_empleado').val();

				$.ajax({
					type: 'post',
					url: "{{url('modificarEmpl')}}",
					data: {nombre_empleado: nombre_empleado,apellido_empleado: apellido_empleado,direccion_empleado: direccion_empleado, telefono_empleado: telefono_empleado, id_empresa: id_empresa,id_empleado: id_empleado},
					success: function(array){
						alert('Se modifico al empleado');

						window.location.replace("../index");
					}
				});

			});

		});		

	</script>
