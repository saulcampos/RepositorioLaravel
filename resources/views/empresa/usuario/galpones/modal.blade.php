<div class="modal fade" tabindex="-1" role="dialog" id="ventana_modal">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                               aria-hidden="true">X</span></button>

                       <h4 class="modal-title" v-if="!editando">Nuevo usuario</h4>
                        <h4 class="modal-title" v-if="editando">Editando usuario</h4>
          <!--Cuando la varible editando sea False aparece esto -->


                   </div>
                   <div class="modal-body">
                     <br>
                   <div class="row">
                     <div class="col-md-6">
                       <input v-if="!editando" class="form-control" type="text"  name="" placeholder="Nick name" v-model="nickname">

                       <input disabled v-if="editando" class="form-control" type="text"  name="" placeholder="Nick name" v-model="nickname">
                      
                      </div>

                     <div class="col-md-6">
                       <select  class="form-control" v-model="idrol">
                         <option disabled value="">Elige un rol </option>
                         <option v-for="rol in roles" v-bind:value="rol.idrol" >@{{rol.rol}} </option>
                       </select>
                     <!--v-bind:value= value de JsVue -->
                    </div>

           
         </div><br>

                   <div class="row">
                     <div class="col-md-6">
                       <select  class="form-control" v-model="idempleado">
                         <option disabled value="">Elige un empleado</option>
                         <option v-for="empleado in empleados" v-bind:value="empleado.idempleado" >@{{empleado.nombres}} </option>
                       </select>
                     <!--v-bind:value= value de JsVue -->
                    </div>

                       

                       <div class="col-md-6">
                       <input class="form-control" type="text" name="" placeholder="Contraseña" v-model="password">
                       </div>

                   </div><br>


                   <div class="row">
                     <div class="col-md-12">
                       <input class="form-control" type="file" name="" placeholder="Imagen" v-model="foto">
                     </div>
                   </div>
                   <br>


                   <div class="modal-footer">



                     <button type="button" class="btn btn-danger active" v-on:click="Canselar()">Cancelar</button>
                      <button type="submit" class="btn btn-primary active" v-on:click="agregarUsuario()" v-if="!editando">Guardar</button>
                      <button  class="btn btn-primary active" v-on:click="updateUsuario(Aux_nickname)" v-if="editando">Actualizar</button>


                   </div>
               </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
       </div><!-- /.modal -->