
<br>

	<div class="row">
		<div class="col-md-10">
			<input type="text" name="" placeholder="Escriba nombre" class="form-control" v-model="search">
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
						<tr v-for="cliente in filtroClientes2">
		  		  			<td>@{{cliente.nombres}}</td>
              				<td>@{{cliente.telefono}}</td>
              				<td>@{{cliente.direccion}}</td>
              				       
						<td>
							

							<span class="btn btn-warning active glyphicon glyphicon-heart-empty"  v-on:click="BajaCliente(cliente.idcliente)" ></span>

		
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>
