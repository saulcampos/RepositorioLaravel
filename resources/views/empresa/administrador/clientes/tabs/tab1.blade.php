<br>
	<div class="row">
		  <div class="col-md-12"><!--Cuando le des clic ejecutame el metodo SHOW MODAL -->
			<button class=" btn btn-primary active" class="btn btn-primary" v-on:click="showModal()">Agregar</button>
		  </div>
	</div>
<br>

	<div class="row">
		<div class="col-md-10">
			<input type="text" name="" placeholder="Escriba nombre" class="form-control" v-model="buscar">
		</div>
	</div>
<br>	


	<div class="row">
			 <div class="col-xs-12 col-md-10">
				<table id="tablita" class="table table-responsive table-striped table-bordered table-condensed table-hover">
					<thead class="table">
						<tr class="warning">
			 				<th>Nombres</th>
              				<th>Telefono</th>
              				<th>Dirección</th>
              				<th>Operaciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="cliente in filtroClientes">
		  		  			<td>@{{cliente.nombres}}</td>
              				<td>@{{cliente.telefono}}</td>
              				<td>@{{cliente.direccion}}</td>
              				       
						<td>
							<span class="btn btn-primary active glyphicon glyphicon-pencil" v-on:click="editCliente(cliente.idcliente)" ></span>

							<span class="btn btn-danger active glyphicon glyphicon-trash" v-on:click="BajaCliente(cliente.idcliente)" ></span>

							<!-- <span class="btn btn-warning active glyphicon glyphicon-trash" v-on:click="eliminarCliente(cliente.idcliente)" ></span>  -->
							
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>


	

@include('empresa.administrador.clientes.modal');