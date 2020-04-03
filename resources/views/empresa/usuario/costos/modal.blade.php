        <div class="modal fade" tabindex="-1" role="dialog" id="ventana_modal">
           <div class="modal-dialog  modal-lg" role="document">
               <div class="modal-content">


                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                               aria-hidden="true">X</span></button>

                        <h4 class="modal-title" v-if="!editando">Ingreso de costos</h4>
                        <h4 class="modal-title" v-if="editando">Ver detalles de costo</h4>                       
                   </div>
                   <div class="modal-body">
  
                      <div v-if="!editando">
                         @include('empresa.usuario.costos.vistas.insertar');
                      </div>


                      <div v-if="editando">
                        @include('empresa.usuario.costos.vistas.detalles');
                      </div>                  
 
                   </div>
                   <div class="modal-footer">

                        <button v-if="!editando" type="button" class="btn btn-danger active" data-dismiss="modal" v-on:click="Canselar()">Salir</button>

                        <button v-if="editando" type="button" class="btn btn-primary active" data-dismiss="modal" v-on:click="Canselar()">Salir</button>

                        <button  class="btn btn-primary active" v-on:click="agregarCosto()" v-if="!editando" >Guardar</button>

                        <span class="btn btn-danger active glyphicon glyphicon-trash" v-if="editando" v-on:click="eliminarDCosto(AuxIdcosto)" ></span>



                   </div>



               </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
       </div><!-- /.modal -->