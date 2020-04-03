@extends('layouts.adminlte')
@section('titulo','Gallineros')

@section('head')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


<meta name="token" id="token" value="{{ csrf_token() }}">

<script src="{{asset('js/vue.min.js')}}"></script>
<script src="{{asset('js/vue-resource.min.js')}}"></script>
@endsection



@include('empresa.administrador.menuLat')




@section('buscar')

@endsection


@section('contenido')
 <style type="text/css">
 	thead, tbody{
 		align-items: center;
 		align-content: center;
 		text-align: center;
 	}
 </style>
<style type="text/css">.container button{ text-transform:uppercase; }</style>
<div class="container">
	<div id="apigalli">

	
<br>
	<div class="row">
		  <div class="col-md-12">
			<button class=" btn btn-primary active" class="btn btn-primary" v-on:click="showModal()">Agregar</button>
		  </div>
	</div>
		<br>

<div class="row">
    <div class="col-md-10">
      <input type="text" name="" placeholder="Escriba nombre" class="form-control" v-model="buscar">
    </div>
  </div>
  <br>


		<div class="row">
			 <div class="col-xs-12 col-md-10">
				<table id="tablita" class="table table-responsive table-striped table-bordered table-condensed table-hover">
					<thead class="table">
						<tr class="warning">
			 				<th>Nombre</th>
              				<th>Cantidad</th>
              				<th>Operaciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="gallinero in filtroGallineros">
		  		  			<td>@{{gallinero.nombre}}</td>
              				<td>@{{gallinero.cantidad}}</td>	       
						<td>
							<span class="btn btn-primary active glyphicon glyphicon-pencil" v-on:click="editGallinero(gallinero.idgallinero)" ></span>
							<span class="btn btn-danger active glyphicon glyphicon-trash" v-on:click="BajaGallinero(gallinero.idgallinero)" ></span>
							<!-- <span class="btn btn-warning active glyphicon glyphicon-trash" v-on:click="eliminarGallinero(gallinero.idgallinero)" ></span> -->

							
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>


	

@include('empresa.administrador.gallineros.modal');






     </div>
</div> 	{{-- Fin del VUE --}}


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Vue/adminitrador/gallineros.js')}}"></script>

@endsection
<input type="hidden" name="route" value="{{url('/')}}">
