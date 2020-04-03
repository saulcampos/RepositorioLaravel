<div class="row">
  <div class="col-md-12">
    <select  class="form-control" v-model="idproveedor">
      <option disabled value="">Elige un proveedor</option>

      <option v-for="proveedor in proveedores" 
              v-bind:value="proveedor.idproveedor">@{{proveedor.nombres}}
      </option>
    </select>     
  </div>
</div> 
<br>

<div class="row">
  <div class="col-md-12">
    <label>Slecciona un producto</label>
             <select  class="form-control" v-model="idproducto"
                    @change="getProducto(idproducto)">
                        <option disabled selected>Elige un producto</option>

                        <option v-for="producto in productos" 
                        v-bind:value="producto.idproducto">@{{producto.nombre}}
                        </option>
            </select>     
  </div>
</div> 

<br>
   <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <textarea class="form-control" placeholder="Escribe una descripcion (OPCIONAL)"   v-model="descripcion" rows="2"></textarea>
          </div>
      </div>
   </div>
<br>


<div class="row">
  <div class="col-md-12">
    <table class="table table-responsive table-bordered table-hover">
      <thead style="background: #ac2925">
          
          <th>Nombre</th>
          <th>Precio</th>
          <th>cantidad</th>
          <th>total</th>
          <th>Opciones</th>
      </thead>


      <tbody>
          <tr v-for="(producto,index) in matris">
            
              <td>@{{producto.nombre}}</td>
              <td>@{{producto.precio}}</td>
              <td><input class="form-control input-sm" type="number" min="1"  v-model.number="cantidades[index]"></td>
              <td>@{{Total(index)}}</td>
              <td><span class="glyphicon glyphicon-remove btn btn-sm btn-danger" v-on:click="eliminarProducto(index)"></span></td>
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