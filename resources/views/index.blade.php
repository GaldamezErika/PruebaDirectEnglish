<body>

	<div class="container">
		<br>
		<h1 align="center">GESTION DE REGISTROS</h1>
		<br>
		<h3>NOTA:<p>Despliegue el acordión haciendo clic al apartado</p></h3>
	</div>
	
	
	<!-- Modal de los empledos -->

	<div class="modal" tabindex="-1" role="dialog" id="NuevoEmpl">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nuevo Empleado</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ asset('/agregar')}}" method="POST">
						@csrf
						<div class="row">
							<div class="col">
								<label>Nombre:</label>
								<input type="text" name="nombre" id="nombre" class="form-control">
							</div>
							<div class="col">
								<label>Apellido:</label>
								<input type="text" name="apellido" id="apellido" class="form-control">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label>Dirección:</label>
								<input type="text" name="direccion" id="direccion" class="form-control">
							</div>
							<div class="col">
								<label>Telefono:</label>
								<input type="text" name="telefono" id="telefono" class="form-control" placeholder="ejemplo: 0000-0000">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label>Empresa:</label>
								<select name="empresa" id="empresa" class="form-control">
									<option value="">--Seleccione empresa--</option>
									@foreach($empresas as $e)
									<option value="{{$e->id_empresa}}">{{$e->nombre_empresa}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal de las empresas -->

	<div class="modal" tabindex="-1" role="dialog" id="NuevoEmpre">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nueva empresa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ asset('/agregarEmpr')}}" method="POST">
						@csrf
						<div class="row">
							<div class="col">
								<label>Empresa:</label>
								<input type="text" name="empresa" id="empresa" class="form-control">
							</div>
							<div class="col">
								<label>Direccion:</label>
								<input type="text" name="direccion" id="direccion" class="form-control">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label>Telefono:</label>
								<input type="text" name="telefono" id="telefono" class="form-control">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="btn">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<!-- Acordion -->

	<div class="accordion" id="accordionExample">
		<div class="card">
			<div class="card-header" id="headingOne">
				<h2 class="mb-0">
					<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						EMPLEADOS
					</button>
				</h2>
			</div>

			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body">
					<div class="container">
						<h1>Empleados</h1>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#NuevoEmpl">Nuevo empleado</button>
						<br>
						<br>
						<table class="table table-hover table-bordered table-striped table-sm">
							<thead class="thead-dark">
								<tr>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Telefono</th>
									<th>Dirección</th>
									<th>Empresa</th>
									<th colspan="2">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($empleados as $em)
								<tr>
									<td>{{$em->nombre_empleado}}</td>
									<td>{{$em->apellido_empleado}}</td>
									<td>{{$em->telefono_empleado}}</td>
									<td>{{$em->direccion_empleado}}</td>
									<td>{{$em->nombre_empresa}}</td>
									<td><a href="{{ url('/eliminar', $em->id_empleado)}}" class="btn btn-outline-danger">Eliminar</a></td>
									<td><a href="{{ url('/getDatosEmpl', $em->id_empleado)}}" class="btn btn-outline-primary">Modificar</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header" id="headingTwo">
				<h2 class="mb-0">
					<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						EMPRESAS
					</button>
				</h2>
			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				<div class="card-body">
					<div class="container">
						<h1>Empresas</h1>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#NuevoEmpre">Nueva empresa</button>
						<br>
						<br>
						<table class="table table-hover table-bordered table-striped table-sm">
							<thead class="thead-dark">
								<tr>
									<th>Empresa</th>
									<th>Direccion</th>
									<th>Telefono</th>
									<th colspan="2">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($emp as $empre)
								<tr>
									<td>{{$empre->nombre_empresa}}</td>
									<td>{{$empre->direccion_empresa}}</td>
									<td>{{$empre->telefono_empresa}}</td>
									<td><a href="{{ url('/eliminarEmpr', $empre->id_empresa)}}" class="btn btn-outline-danger">Eliminar</a></td>
									<td><a href="{{ url('/getDatosEmpr', $empre->id_empresa)}}" class="btn btn-outline-primary">Modificar</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
