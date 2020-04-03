@extends('layouts.adminlte')
@section('titulo','Alamcen')

@section('head')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


<meta name="token" id="token" value="{{ csrf_token() }}">

<script src="{{asset('js/vue.min.js')}}"></script>
<script src="{{asset('js/vue-resource.min.js')}}"></script>
@endsection



@include('empresa.usuario.menuLat')




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
	<div id="apiAlmacen">




<br>
	<div class="row">
		  <div class="col-md-12">
			<button class=" btn btn-primary active" class="btn btn-primary" v-on:click="showModal()">Agregar</button>
		  </div>
	</div>
		<br>

<div class="row">
    <div class="col-md-10">
      <input type="text" name="" placeholder="Escriba la fecha" class="form-control" v-model="buscar">
    </div>
  </div>
  
 <br>
		<div class="row">
			 <div class="col-xs-12 col-md-10">
				<table id="tablita" class="table table-responsive table-striped table-bordered table-condensed table-hover">
					<thead class="table">
						<tr class="warning">
			 				<th>fecha</th>
              				<th>Porveedro</th>
              				<th>total</th>
              				<th>Operaciones</th>
						</tr>
					</thead>

					<tbody>
						<tr v-for="almacen in filtroAlmacen">
		  		  			<td>@{{almacen.fecha_logica}}</td>
              				<td>@{{almacen.proveedor.nombres}}</td>
              				<td>@{{almacen.total}}</td>
              				       
						<td>
							<span class="btn btn-primary active glyphicon glyphicon-search" v-on:click="showAlmacen(almacen.idalmacen)" ></span>

							
							
							
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		 </div>


	


		 @include('empresa.usuario.almacen.modal');




     </div>
</div> 	{{-- Fin del VUE --}}


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Vue/moment-with-locales.min.js')}}"></script>
<script src="{{asset('js/Vue/usuario/almacen.js')}}"></script>

@endsection
<input type="hidden" name="route" value="{{url('/')}}">

