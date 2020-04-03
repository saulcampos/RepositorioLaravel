<br>
<div class="row">
  <div class="col-md-10">
    <div class="input-group">
           <input type="text" placeholder="Escriba nombre" class="form-control" v-model="buscar"> 

            <span v-on:click="getServicio(idservicio)" 
                  class="input-group-btn" >
                  <button class=" btn btn-primary active" v-on:click="showModal()">Agregar</button>
            </span>

    </div>
  </div>
</div> 

<br>


  <div class="row">
       <div class="col-xs-12 col-md-10">
        <table id="tablita" class="table table-responsive table-striped table-bordered table-condensed table-hover">
          <thead class="table">
            <tr class="warning">
              <th >Nick name</th>
              <th>Nombre</th>
      
             
              <th>Contraseña</th>
              <th>Rol</th> 
     
              <th>Foto</th>
             
              <th>Operaciones</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="usuario in filtroUsuarios">
              <td>@{{usuario.nickname}}</td>
              <td>@{{usuario.empleado.nombres}}</td>
              <td>@{{usuario.password}}</td>
              <td>@{{usuario.rol.rol}}</td>
            

              <td><img v-bind:src="`user/${usuario.foto}`" class="img-rounded img-thumbnail" width="100" height="100"></td>
           

            <td>
              <span class="btn btn-primary active glyphicon glyphicon-pencil" v-on:click="editUsuarios(usuario.nickname)" ></span>
              <span class="btn btn-danger active glyphicon glyphicon-trash" v-on:click="BajaUsuario(usuario.nickname)" ></span>

             <!--  <span class="btn btn-warning active glyphicon glyphicon-trash" v-on:click="eliminarUsuario(usuario.nickname)" ></span> -->
            </td>
            </tr>
          </tbody>
        </table>
      </div>
     </div>

@include('empresa.administrador.usuarios.modal');