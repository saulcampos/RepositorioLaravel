
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
			 				<th>Nombre</th>
              				<th>Descripcion</th>
              				<th>Operaciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="categoria in filtroCategorias2">
		  		  			<td>@{{categoria.nombre}}</td>
              				<td>@{{categoria.descripcion}}</td>
              				
              				       
						<td>
							<span class="btn btn-warning active glyphicon glyphicon-heart-empty" v-on:click="BajaCategoria(categoria.idcategoria)" ></span>
	
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>