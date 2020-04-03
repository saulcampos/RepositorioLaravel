        <div class="modal fade" tabindex="-1" 
                role="dialog" id="ventana_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">X</span></button>
                        <h4 class="modal-title" v-if="!editando">Nuevo proveedro</h4>
                        <h4 class="modal-title" v-if="editando">Editando proveedor</h4>
                    </div>


                    <div class="modal-body">
                    <div  v-if="editando"  class="row">
                        <div class="col-md-12">
                            <p>Clave</p>
                            <input disabled disabled class="form-control" type="text"  v-model="idproveedor" >
                        </div>
                    </div>
                    <br>

                    <div class="row">
                     	<div class="col-md-6">
                    		<input class="form-control" type="text"  v-model="nombres" placeholder="Nombre del proveedor" >
                        </div>
                         <div class="col-md-6">
                            <input class="form-control" type="text"  v-model="direccion" placeholder="direecion del proveedor" >
                        </div>
                    </div>
                        
                    <br>
                    
                     <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text"  v-model="telefono" placeholder="telefono del proveedor" >
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text"  v-model="email" placeholder="email del proveedor" >
                        </div>
                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger active" data-dismiss="modal" v-on:click="Canselar">Cancelar</button>

                        <button type="submit" class="btn btn-primary active" v-on:click="agregarProveedor()" v-if="!editando" >Guardar</button>

                        <button type="submit" class="btn btn-primary active" v-on:click="updateProveedor(Aux_idproveedor)" v-if="editando" >Actualizar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->