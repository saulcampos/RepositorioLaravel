function init()
{
	var	route = document.querySelector("[name=route]").value;
	var Inactivos='/RolesInactivos';
	var urlRol='/apiRoles';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apiroles',

	created:function()
	{
		this.getRoles();
		this.getRolesInactivos();

	},

	data:{
		roles:[],
		rolesInactivos:[],
		idrol:"",
		rol:'',
		status:'',
		AuxIdrol:"",
		editando:false,
		buscar:'',
		search:''	//
	},

	methods:{
		getRoles:function(){
			this.$http.get(route+urlRol).then
			(function(response){
				console.log(response);
				this.roles=response.data;
			});
		},

		getRolesInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.rolesInactivos=response.data;
			});
		},
		
		agregarRol:function(){				
				var rol={
						 rol:this.rol,
						 status:1
				        };
				
			if (rol.rol) {
				this.$http.post(route+urlRol,rol).then
				(function(response){
					$('#ventana_modal').modal('hide');
					this.getRoles(); 
					this.Vacio();
				});
				
			}
			else
					alert("El campo nombre no puede ser vacio");	
			},



		editRol:function(id){
				
				this.editando=true;
				$('#ventana_modal').modal('show');

				this.$http.get(route+urlRol + '/' + id).then
				(function(response){
					console.log(response);
					this.rol=response.data.rol;
					this.status=response.data.status;

					this.AuxIdrol=response.data.idrol					
				});
			},

			updateRol:function(id){
				//alert(id);
			var rol={
				     rol:this.rol,
				     status:this.status
			        }

			if (rol.rol) 
			{
				this.$http.patch(route+urlRol + '/' + id,rol).then
				(function(response){
					console.log(response);
					this.getRoles();
					this.editando=false;
					this.Vacio();
					$('#ventana_modal').modal('hide');					
				});

			}
			else
				alert("El campo nombre no puede ser vacio");
			},


			BajaRol:function(id){
				
				var confirmar = confirm("¿Esta seguro?")
				if(confirmar)
				{
				 this.$http.get(route+urlRol+'/'+id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var rol=
				 		    {						  
						  		status:this.status,
						  		variable:"ok"
							};


					this.$http.patch(route+urlRol+ '/'+ id,rol).then
					(function(response)
			    	{  	console.log(response);
						this.getRolesInactivos();
						this.getRoles();
						this.Vacio();			
					});

				});
				}//FIN del IF

			},


		    eliminarRol:function(id){
				//alert(id);
				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar){
					this.$http.delete(route+urlRol + '/' + id).then
					(function(response){
						this.getRoles();
					});
				}
			},

		    showModal:function(){
				$('#ventana_modal').modal('show');
			},

			Vacio:function(){
				this.editando=false;
				this.idrol='';
				this.AuxIdrol='',
				this.status='',
				this.rol='';
			},

			Canselar:function(){
				//debugger;
				this.Vacio();
				$('#ventana_modal').modal('hide');

			},

	},//FIN DEL Mehthods


computed:{
		filtroRoles:function(){
			return this.roles.filter((rol)=>{
				return rol.rol.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},

		filtroRoles2:function(){
			return this.rolesInactivos.filter((rol)=>{
				return rol.rol.toLowerCase().match(this.search.toLowerCase().trim());
			});
		}


	}



});
}
window.onload=init;
Vue.config.devtools = true;