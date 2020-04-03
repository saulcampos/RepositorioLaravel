<div class="row">
      <div class="col-md-6">
        <label>fecha</label>
        <input disabled  class="form-control" type="text" v-model="fecha_logica" >
      </div>
      <div class="col-md-6">
       <label>total</label>
       <input disabled  class="form-control" type="text" v-model="total" >
      </div>              
</div>
                      

<br>

<div class="row">
  <div class="col-xs-12">
    <table id="tablita" class="table table-responsive table-striped table-bordered table-condensed table-hover">
        <thead class="table">
            <tr class="warning">
              <th>Servicio</th>
              <th>costo</th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="dcosto in DCostos">
              <td>@{{dcosto.servicios.nombre}}</td>
              <td>@{{dcosto.precio}}</td>
            </tr>
        </tbody>
    </table>
  </div>
</div> 

<br>

<div class="row">
     <div class="col-md-12">
      <div class="form-group">
        <label>descripcion</label>
        <textarea disabled="" class="form-control" v-model="descripcion"></textarea>
      </div>
    </div>
</div>