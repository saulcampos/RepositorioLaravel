		<br>

<div class="row">
    <div class="col-md-10">
      <input type="text"  placeholder="Escriba nombre" class="form-control" v-model="search">
    </div>
  </div>
  <br>


		<div class="row">
			 <div class="col-md-10">
				<table id="tablita" class="table table-responsive table-striped table-bordered table-condensed table-hover">
					<thead class="table">
						<tr class="warning">
			 				<th>Nombre</th>
              				<th>precio compra</th>
              				
              				<th>imagen</th>
              				<th>categoria</th>
              				<th>operaciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="producto in filtroProductos2">
		  		  			<td>@{{producto.nombre}}</td>
              				<td>@{{producto.precio_compra}}</td>
              				
              				<td>@{{producto.foto}}</td>
              				<td>@{{producto.categoria.nombre}}</td>
              				
              				       
						<td>
							<span class="btn btn-warning active glyphicon glyphicon-heart-empty" v-on:click="BajaProducto(producto.idproducto)" ></span>
							

							
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>


	

