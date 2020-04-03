        <div class="modal fade" tabindex="-1" 
                role="dialog" id="ventana_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">X</span></button>
                        <h4 class="modal-title" v-if="!editando">Nuevo producto</h4>
                        <h4 class="modal-title" v-if="editando">Editando producto</h4>
                    </div>


                    <div class="modal-body">
                       <div v-if="!editando" class="row">
                        <div class="col-md-12">
                            <p><input type="checkbox" class="form-check-input"
                                v-model="check" >
                                <strong>¿El producto no tiene una codigo de barras?</strong>
                            </p>
                        </div>
                    </div>
                    <br>
                    <div   class="row">
                        <div v-if="!check && !editando"  class="col-md-6">
                            <p>Clave</p>
                            <input  class="form-control" type="text" placeholder="la clave del producto"  v-model="idproducto" >
                        </div>

                        <div v-if="editando" class="col-md-6">
                            <p>Clave</p>
                            <input disabled  class="form-control" type="text" placeholder="la clave del producto"  v-model="idproducto" >
                        </div>

                        <div class="col-md-6">
                            <p>nombre</p>
                            <input class="form-control" type="text" placeholder="Escriba la el nombre" v-model="nombre" >
                        </div>
                    </div>
                    <br>

                    <div class="row">
                     	<div class="col-md-6">
                            <p>stock min</p>
                    		<input class="form-control" type="text"  v-model="stockmin" placeholder="stok minimo" >
                        </div>
                        <div class="col-md-6">
                            <p>stock max</p>
                            <input class="form-control" type="text"  v-model="stockmax" placeholder="stok maximo" >
                        </div>
                    </div>

                        <br>
                    <div  class="row">
                        <div class="col-md-6">
                            <p>precio compra</p>
                            <input class="form-control" type="text"  v-model="precio_compra" placeholder="Porecio de compra" >
                        </div>
                        <div class="col-md-6">
                            <p>precio de venta</p>
                            <input class="form-control" type="text"  v-model="precio_venta" placeholder="Porecio de venta" >
                        </div>
                    </div>

                    <br>
                    
                     <div class="row">
                        <div class="col-md-6">
                            <p>descripción</p>
                            <input class="form-control" type="text"  v-model="descripcion" placeholder="Escribe una descripcion" >
                        </div>
                        <div class="col-md-6">
                            <p>selecciona una foto</p>
                            <input disabled class="form-control" type="text"  v-model="foto"  >
                        </div>
                    </div><br>

                     <div class="row">
                        <div class="col-md-6">
                            <p>categoria</p>
                            <select  class="form-control" v-model="idcategoria">
                                <option disabled value="">Elige una categoria </option>
                                <option v-for="categoria in categorias" v-bind:value="categoria.idcategoria" >@{{categoria.nombre}} </option>
                           </select>

                        </div>
                        
                     </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger active" data-dismiss="modal" v-on:click="Canselar()">Cancelar</button>

                        <button type="submit" class="btn btn-primary active" v-on:click="agregarProducto()" v-if="!editando" >Guardar</button>

                        <button type="submit" class="btn btn-primary active" v-on:click="updateProducto(AuxIdproducto)" v-if="editando" >Actualizar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->