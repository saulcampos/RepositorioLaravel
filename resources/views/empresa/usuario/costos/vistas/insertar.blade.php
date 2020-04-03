<div class="row">
  <div class="col-md-12">
    <div class="input-group">
           <select  class="form-control" v-model="idservicio"
                    v-on:keyup.enter="getServicios(idservicio)">
                        <option disabled value="">Elige un servicio</option>

                        <option v-for="servicio in servicios" 
                        v-bind:value="servicio.idservicio">@{{servicio.nombre}}
                        </option>
            </select>

            <span v-on:click="getServicio(idservicio)" 
                  class="input-group-btn" >
                  <button type="button" class="btn btn-primary active" >Agregar</button>
            </span>

    </div>
  </div>
</div> 

<br>
   <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <textarea class="form-control"   v-model="descripcion" rows="2"></textarea>
          </div>
      </div>
   </div>
<br>

<div class="row">
  <div class="col-md-12">
    <table class="table table-responsive table-bordered table-hover">
      <thead style="background: #ac2925">
          <th>Nombre</th>
          <th>Precio compra</th>
          <th>Opciones</th>
      </thead>


      <tbody>
          <tr v-for="(servicio,index) in matris">
              <td>@{{servicio.nombre}}</td>
              <td><input class="form-control input-sm" type="number" min="0" v-model.number="precios[index]"></td>
              <td><span class="glyphicon glyphicon-remove btn btn-sm btn-danger" v-on:click="eliminarServicio(index)"></span></td>
          </tr>
      </tbody>
    </table>
  </div>
</div>


<br>
<div class="row">
                          
    <div class="col-md-2 col-xs-2">
      <div style="border: black"  class="from-control "><strong>Total</strong></div>
    </div>
    <div class="col-md-3 col-xs-3">
      <div class="from-control "><strong> @{{granTotal}}</strong></div>
    </div>

</div>