<div class="modal fade" tabindex="-1" role="dialog" id="ventana_modal">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                               aria-hidden="true">X</span></button>

                       <h4 class="modal-title" v-if="!editando">Nuevo Empleado</h4>
                        <h4 class="modal-title" v-if="editando">Editando Empleado</h4>
          <!--Cuando la varible editando sea False aparece esto -->


                   </div>
                   <div class="modal-body">
                     <br>
                   <div v-if="editando" class="row">
                     <div class="col-md-12">
                       <input  disabled  class="form-control" type="text"   placeholder="Clave de empleado" v-model="idempleado">
                      </div>                
                  </div><br>

                  <div class="row">
                     <div class="col-md-12">
                       <input class="form-control" type="text" name="" placeholder="Nombre completo del trabajador" v-model="nombres">
                     </div>
                  </div>
                  <br>

                   <div class="row">
                     <div class="col-md-12">
                       <select  required class="form-control" v-model="idpuesto">
                         <option disabled value="">Elige un puesto </option>
                         <option v-for="puesto in puestos" v-bind:value="puesto.idpuesto" >@{{puesto.nombre}} </option>
                       </select>
                     <!--v-bind:value= value de JsVue -->
                    </div>
                   </div>

                   <br>


                   <div class="modal-footer">



                     <button type="button" class="btn btn-danger active" v-on:click="Canselar()">Cancelar</button>

                      <button type="submit" class="btn btn-primary active" v-on:click="agregarEmpleado()" v-if="!editando">Guardar</button>

                      <button  class="btn btn-primary active" v-on:click="updateEmpleado(Aux_idempleado)" v-if="editando">Actualizar</button>


                   </div>
               </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
       </div><!-- /.modal -->