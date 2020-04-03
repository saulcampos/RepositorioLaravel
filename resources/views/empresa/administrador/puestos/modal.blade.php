      <div class="modal fade" tabindex="-1" role="dialog" id="ventana_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">X</span></button>
                        <h4 class="modal-title" v-if="!editando">Nuevo Puesto</h4>
                        <h4 class="modal-title" v-if="editando">Editando Puesto</h4>
                    </div>


                    <div class="modal-body">
                        <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text"  v-model="nombre" placeholder="Nombre del puesto" >
                        </div>
                      </div>
                        <br>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger active" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary active" v-on:click="agregarPuesto()" v-if="!editando" >Guardar</button>

                        <button type="submit" class="btn btn-primary active" v-on:click="updatePuesto(Aux_idpuesto)" v-if="editando" >Actualizar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->