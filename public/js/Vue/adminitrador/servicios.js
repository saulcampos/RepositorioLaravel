function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlSer='/apiServicios';
	var Inactivos='/ServiciosInactivos';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apiSer',

	created:function()
	{
		this.getServicios();
		this.getServiciosInactivos();
	},

	data:{
		servicios:[],
		serviciosInactivos:[],
		idservicio:"",
		nombre:'',
		descripcion:'',
		status:'',
		AuxIdservicio:"",
		editando:false,
		buscar:'',
		search:''	
	},

	methods:{
		getServicios:function(){
			this.$http.get(route+urlSer).then
			(function(response){
				console.log(response);
				this.servicios=response.data;
			});
		},

		getServiciosInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.serviciosInactivos=response.data;
			});
		},


			agregarServicio:function(){				
				var servicio={
						  nombre:this.nombre,
						  descripcion:this.descripcion,
						  status:1
						};
			
			if (servicio.nombre) {
				this.$http.post(route+urlSer,servicio).then
				(function(response){
					$('#ventana_modal').modal('hide');
					this.Vacio();
					this.getServicios();
				});
				
			}
			else
					alert("El campo nombre no puede ser vacio");
	
			},




			editServicio:function(id){
				
				this.editando=true;
				$('#ventana_modal').modal('show');

				
				this.$http.get(route+urlSer + '/' + id).then
				(function(response){

					console.log(response);
					this.idservicio=response.data.idservicio;
					this.nombre=response.data.nombre;
					this.descripcion=response.data.descripcion;
					this.status=response.data.status;			

					this.AuxIdservicio=response.data.idservicio					
				});
			},

			updateServicio:function(id){

				var servicio={
						  nombre:this.nombre,
						  descripcion:this.descripcion,
						  status:this.status
						};

			if (servicio.nombre) 
			{

				
				this.$http.patch(route+urlSer + '/' + id,servicio).then
				(function(response){
					console.log(response);
					this.getServicios();
					this.editando=false;
					$('#ventana_modal').modal('hide');
					this.Vacio();					
				});
				
			}
			else
					alert("El campo nombre no puede ser vacio");
			},

			BajaServicio:function(id){

				var confirmar = confirm("Esta seguro de eliminar el registro?")
				if(confirmar)
				{
				 this.$http.get(route+urlSer+'/'+id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var servicio=
				 		    {						  
						  		status:this.status,
						  		variable:"ok"
							};


					this.$http.patch(route+urlSer+'/'+ id,servicio).then
					(function(response)
			    	{  	console.log(response);
						this.getServicios();
						this.getServiciosInactivos();
						this.Vacio();			
					});

				});
				}//FIN del IF
			},

			eliminarServicio:function(id){
				
				var confirmar = confirm("Esta seguro de eliminar el registro?")
				if(confirmar){
					this.$http.delete(route+urlSer + '/' + id).then
					(function(response){
						this.getServicios();
					});
				}

			},


		    showModal:function(){
				$('#ventana_modal').modal('show');
			},

			Canselar:function(){
				//debugger;
				this.Vacio();
				$('#ventana_modal').modal('hide');

			},

			Vacio:function(){
				this.idservicio='';
				this.nombre='';
				this.descripcion='';
				this.editando=false;
				this.status='';
			}


	
	},//FIN DEL Mehthods


computed:{
		filtroServicios:function(){
			return this.servicios.filter((servicio)=>{
				return servicio.nombre.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},
		filtroServicios2:function(){
			return this.serviciosInactivos.filter((servicio)=>{
				return servicio.nombre.toLowerCase().match(this.search.toLowerCase().trim());
			});
		}
	}



});
}
window.onload=init;
Vue.config.devtools = true;