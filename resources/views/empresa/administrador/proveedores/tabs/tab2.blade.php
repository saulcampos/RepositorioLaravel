
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
              				<th>direccion</th>
              				<th>tel.</th>
              				<th>email</th>
              				<th>Opciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="proveedor in filtroProveedores2">
		  		  			<td>@{{proveedor.nombres}}</td>
              				<td>@{{proveedor.direccion}}</td>
              				<td>@{{proveedor.telefono}}</td>
              				<td>@{{proveedor.email}}</td>
              				
              				       
						<td>
							<span class="btn btn-warning active glyphicon glyphicon-heart-empty"  v-on:click="BajaProveedor(proveedor.idproveedor)" ></span>
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>


	

