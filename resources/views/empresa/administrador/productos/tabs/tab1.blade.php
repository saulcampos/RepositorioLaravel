<br>
<div class="row">
  <div class="col-md-10">
    <div class="input-group">
           <input type="text" placeholder="Escriba nombre" class="form-control" v-model="buscar"> 

            <span v-on:click="getServicio(idservicio)" 
                  class="input-group-btn" >
                  <button class=" btn btn-primary active" v-on:click="showModal()">Agregar</button>
            </span>

    </div>
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
						<tr v-for="producto in filtroProductos">
		  		  			<td>@{{producto.nombre}}</td>
              				<td>@{{producto.precio_compra}}</td>
              				
              				<td>@{{producto.foto}}</td>
              				<td>@{{producto.categoria.nombre}}</td>
              				
              				       
						<td>
							<span class="btn btn-primary active glyphicon glyphicon-pencil" v-on:click="editProducto(producto.idproducto)" ></span>
							<span class="btn btn-danger active glyphicon glyphicon-trash" v-on:click="BajaProducto(producto.idproducto)" ></span>
							<!-- <span class="btn btn-warning active glyphicon glyphicon-trash" v-on:click="eliminarProducto(producto.idproducto)" ></span> -->

							
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>


	

@include('empresa.administrador.productos.modal');