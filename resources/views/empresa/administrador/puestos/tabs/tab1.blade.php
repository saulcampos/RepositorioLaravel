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
			 <div class="col-xs-12 col-md-10">
				<table id="tablita" class="table table-responsive table-striped table-bordered table-condensed table-hover">
					<thead class="table">
						<tr class="warning">
			 				<th>Nombres</th>
              				<th>Opciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="puesto in filtroPuestos">
		  		  			<td>@{{puesto.nombre}}</td>           			     
						<td>
							<span class="btn btn-primary active glyphicon glyphicon-pencil" v-on:click="editPuesto(puesto.idpuesto)" ></span>
							<span class="btn btn-danger active glyphicon glyphicon-trash" v-on:click="BajaPuesto(puesto.idpuesto)" ></span>
							<!-- <span class="btn btn-warning active glyphicon glyphicon-trash" v-on:click="eliminarPuesto(puesto.idpuesto)" ></span> -->

							
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>


	

@include('empresa.administrador.puestos.modal');
