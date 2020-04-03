        <div class="modal fade" tabindex="-1" 
                role="dialog" id="ventana_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">X</span></button>
                        <h4 class="modal-title" v-if="!editando">Nuevo Categoria</h4>
                        <h4 class="modal-title" v-if="editando">Editando Categoria</h4>
                    </div>


                    <div class="modal-body">
                    <div v-if="editando"  class="row">
                        <div class="col-md-12">
                            <p>Clave</p>
                            <input disabled class="form-control" type="text"  v-model="idcategoria" >
                        </div>
                    </div>
                    <br>

                    <div class="row">
                     	<div class="col-md-12">
                    		<input class="form-control" type="text"  v-model="nombre" placeholder="Nombre" >
                        </div>
                    </div>
                        <br>
                    <div  class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text"  v-model="descripcion" placeholder="Escribe una descripcion" >
                        </div>
                    </div>
                    <br>
                    

                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger active" data-dismiss="modal" v-on:click="Canselar()">Cancelar</button>
                        <button  class="btn btn-primary active" v-on:click="agregarCategoria()" v-if="!editando" >Guardar</button>

                        <button type="submit" class="btn btn-primary active" v-on:click="updateCategoria(AuxIdcategoria)" v-if="editando" >Actualizar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->