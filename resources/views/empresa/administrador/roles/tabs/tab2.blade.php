
<br>

	<div class="row">
		<div class="col-md-10">
			<input type="text" name="" placeholder="Escriba nombre" class="form-control" v-model="search">
		</div>
	</div>
<br>	



		<div class="row">
			<div class="col-md-10">
				<table class="table table-responsive table-striped table-bordered table-condensed table-hover">
					<thead class="table">
						<tr class="warning">
							<th>Identificador</th>
			 				<th>Nombre</th>
			 				<th>Opciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="rol in filtroRoles2">
							<td>@{{rol.idrol}}</td>
		  		  	        <td>@{{rol.rol}}</td>
						<td>
							<span class="btn btn-warning active glyphicon glyphicon-heart-empty" v-on:click="BajaRol(rol.idrol)" ></span>
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>

