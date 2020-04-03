function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlCliente='/apiClientes';
	var Inactivos='/ClientesInactivos';


new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apiClientes',

	created:function()
	{
		this.getClientes();
		this.getClientesInactivos();
    	
    
	},

	data:{

	clientes:[],
	clientesInactivos:[],
    idcliente:"",
    nombres:"",
    direccion:"",
    telefono:"",
    status:"",

  	Aux_idcliente:"",
  	editando:false,
		buscar:'',
		search:''	//
	},

	methods:{
		getClientes:function(){
			this.$http.get(route+urlCliente).then
			(function(response){
				console.log(response);
				this.clientes=response.data;
			});
		},

		getClientesInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.clientesInactivos=response.data;
			});
		},


		agregarCliente:function(){				
				var cliente={
					nombres:this.nombres,
					telefono:this.telefono,				
					direccion:this.direccion,
					status:1
				};
				

			if (cliente.nombres) 
			{
				this.$http.post(route+urlCliente, cliente).then
				(function(response){
					console.log(response);
					this.getClientes();
					this.Vacio();
					$('#ventana_modal').modal('hide');
				});
			}
			else
			    alert("El campo nombre no puede ser vacio");	
			},



			editCliente:function(id)
			{   this.editando=true;
				$('#ventana_modal').modal('show');

				this.$http.get(route+urlCliente+'/'+id).then
				(function(response){

					console.log(response);
					this.idcliente=response.data.idcliente,
					this.nombres=response.data.nombres,
					this.telefono=response.data.telefono,
					this.direccion=response.data.direccion,
					this.status=response.data.status,
					
					this.Aux_idcliente=response.data.idcliente					
				});
			},

			updateCliente:function(id){
				var cliente={
					idcliente:this.idcliente,
					nombres:this.nombres,
					telefono:this.telefono,
					direccion:this.direccion,				
					status:1
				};	

			 if (cliente.nombres && cliente.telefono)
			{   this.$http.patch(route+urlCliente+'/'+ id,cliente).then
				(function(response){
					console.log(response);
					this.editando=false;
					this.Vacio();					
					$('#ventana_modal').modal('hide');
					this.getClientes();
				});
			}
			else
				alert("El campo nombre y telefono no puede ser vacio");
			},			


			BajaCliente:function(id){
				var confirmar = confirm("Esta seguro de eliminar el registro?")
				if(confirmar)
				{
				 this.$http.get(route+urlCliente+'/'+id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var cliente=
				 		    {status:this.status,
						  	 variable:"ok"
							};

					this.$http.patch(route+urlCliente+'/'+id, cliente).then
					(function(response)
			    	{  	console.log(response);
						this.getClientes();
						this.getClientesInactivos();
						this.Vacio();			
					});

				});
				}//FIN del IF

			},

			eliminarCliente:function(id){
				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar){
					this.$http.delete(route+urlCliente+ '/' + id).then
					(function(response){
						this.getClientes();
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
				this.idcliente='';
				this.nombres='';
				this.direccion='';
				this.telefono='';
				this.status='';
				this.Aux_idcliente='';
				this.editando=false;
			}

   

			

	},//FIN DEL Mehthods



computed:{
		filtroClientes:function(){
			return this.clientes.filter((cliente)=>{
				return cliente.nombres.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},

		filtroClientes2:function(){
			return this.clientesInactivos.filter((cliente)=>{
				return cliente.nombres.toLowerCase().match(this.search.toLowerCase().trim());
			});
		}

		//No es un componente de vue
	}


});
}
window.onload=init;
Vue.config.devtools = true;