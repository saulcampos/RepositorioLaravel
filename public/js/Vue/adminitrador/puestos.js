function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlPuestos='/apiPuestos';
	var Inactivos='/PuestosInactivos';


new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apiPuestos',

	created:function()
	{
		this.getPuestos();
		this.getPuestosInactivos();
    	
    
	},

	data:{

	puestos:[],
	puestosInactivos:[],
    idpuesto:"",
    nombre:"",
    status:"",

  	Aux_idpuesto:"",
  	editando:false,
  	buscar:'',
	search:''	//
	},

	methods:{
		getPuestos:function(){
			this.$http.get(route+urlPuestos).then
			(function(response){
				console.log(response);
				this.puestos=response.data;
			});
		},

		getPuestosInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.puestosInactivos=response.data;
			});
		},


		agregarPuesto:function(){				
				var puesto={
					nombre:this.nombre,
					status:1
				};
				

			if (puesto.nombre) 
			{
				this.$http.post(route+urlPuestos, puesto).then
				(function(response){
					console.log(response);
					this.getPuestos();
					this.Vacio();
					$('#ventana_modal').modal('hide');
				});
			}
			else
			    alert("El campo nombre no puede ser vacio");	
			},



			editPuesto:function(id)
			{   this.editando=true;
				$('#ventana_modal').modal('show');

				this.$http.get(route+urlPuestos+'/'+id).then
				(function(response){

					console.log(response);
					this.idpuesto=response.data.idpuesto,
					this.nombre=response.data.nombre,
					this.status=response.data.status,
					
					this.Aux_idpuesto = response.data.idpuesto					
				});
			},

			updatePuesto:function(id){
				var puesto={
					idpuesto:this.idpuesto,
					nombre:this.nombre,			
					status:1
				};	

			 if (puesto.nombre)
			{   this.$http.patch(route+urlPuestos+'/'+ id,puesto).then
				(function(response){
					console.log(response);
					this.editando=false;
					this.Vacio();					
					$('#ventana_modal').modal('hide');
					this.getPuestos();
				});
			}
			else
				alert("El campo nombre no puede ser vacio");
			},			


			BajaPuesto:function(id){
				var confirmar = confirm("Esta seguro?")
				if(confirmar)
				{
				 this.$http.get(route+urlPuestos+'/'+id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var puesto=
				 		    {status:this.status,
						  	 variable:"ok"
							};

					this.$http.patch(route+urlPuestos+'/'+id, puesto).then
					(function(response)
			    	{  	console.log(response);
						this.getPuestos();
						this.getPuestosInactivos();
						this.Vacio();			
					});

				});
				}//FIN del IF

			},

			eliminarPuesto:function(id){
				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar){
					this.$http.delete(route+urlPuestos+ '/' + id).then
					(function(response){
						this.getPuestos();
					});
				}
			},


	


		showModal:function(){
				$('#ventana_modal').modal('show');//Mostrar un venta modal
			},

		Canselar:function(){
				//debugger;
				this.Vacio();
				$('#ventana_modal').modal('hide');	

			},

			Vacio:function(){
				this.idpuesto='';
				this.nombre='';
				this.status='';
				this.Aux_idpuesto='';
				this.editando=false;
			}

   

			

	},//FIN DEL Mehthods



computed:{
		filtroPuestos:function(){
			return this.puestos.filter((puesto)=>{
				return puesto.nombre.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},
		filtroPuestos2:function(){
			return this.puestosInactivos.filter((puesto)=>{
				return puesto.nombre.toLowerCase().match(this.search.toLowerCase().trim());
			});
		},

		//No es un componente de vue
	}


});
}
window.onload=init;
Vue.config.devtools = true;