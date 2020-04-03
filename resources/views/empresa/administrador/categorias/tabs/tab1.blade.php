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
			 				<th>Nombre</th>
              				<th>Descripcion</th>
              				<th>Operaciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="categoria in filtroCategorias">
		  		  			<td>@{{categoria.nombre}}</td>
              				<td>@{{categoria.descripcion}}</td>
              				
              				       
						<td>
							<span class="btn btn-primary active glyphicon glyphicon-pencil" v-on:click="editCategoria(categoria.idcategoria)" ></span>
							<span class="btn btn-danger active glyphicon glyphicon-trash" v-on:click="BajaCategoria(categoria.idcategoria)" ></span>

							<!-- <span class="btn btn-warning active glyphicon glyphicon-trash" v-on:click="eliminarCategoria(categoria.idcategoria)" ></span> -->

							
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>


	

@include('empresa.administrador.categorias.modal');