function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlProveedor='/apiProveedores';
	var Inactivos='/ProveedoresInactivos';


new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apiProveedores',

	created:function()
	{
		this.getProveedores();
		this.getProveedoresInactivos();    	
    
	},

	data:{

	proveedores:[],
	proveedoresInactivos:[],
    idproveedor:"",
    nombres:"",
    direccion:"",
    telefono:"",
    email:"",
    status:"",
  	Aux_idproveedor:"",
  	editando:false,
  	buscar:'',
	search:''	//
	},

	methods:{
		getProveedores:function(){
			this.$http.get(route+urlProveedor).then
			(function(response){
				console.log(response);
				this.proveedores=response.data;
			});
		},

		getProveedoresInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.proveedoresInactivos=response.data;
			});
		},


		agregarProveedor:function(){				
				var proveedor={
					idproveedor:this.idproveedor,
					nombres:this.nombres,
					direccion:this.direccion,
					telefono:this.telefono,
					email:this.email,					
					status:1
				};
				

			if (proveedor.nombres && proveedor.telefono) 
			{
				this.$http.post(route+urlProveedor,proveedor).then
				(function(response){
					console.log(response);
					this.getProveedores();
					this.Vacio();
					$('#ventana_modal').modal('hide');
				});
			}
			else
			    alert("El campo nombre no puede ser vacio");	
			},


			editProveedor:function(id)
			{   this.editando=true;
				$('#ventana_modal').modal('show');

				this.$http.get(route+urlProveedor + '/' + id).then
				(function(response){

					console.log(response);
					this.idproveedor=response.data.idproveedor,
					this.nombres=response.data.nombres,
					this.direccion=response.data.direccion,
					this.telefono=response.data.telefono,
					this.email=response.data.email,
					this.status=response.data.status,
					
					this.Aux_idproveedor=response.data.idproveedor					
				});
			},

			updateProveedor:function(id){
				var proveedor={
					idproveedor:this.idproveedor,
					nombres:this.nombres,
					direccion:this.direccion,
					telefono:this.telefono,
					email:this.email,					
					status:1
				};	

			 if (proveedor.nombres && proveedor.telefono)
			{   this.$http.patch(route+urlProveedor + '/' + id,proveedor).then
				(function(response){
					console.log(response);
					this.editando=false;
					this.Vacio();					
					$('#ventana_modal').modal('hide');
					this.getProveedores();
				});
			}
			else
				alert("El campo nombre y telefono no puede ser vacio");
			},			


			BajaProveedor:function(id){
				var confirmar = confirm("Esta seguro?")
				if(confirmar)
				{
				 this.$http.get(route+urlProveedor+'/'+id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var proveedor=
				 		    {status:this.status,
						  	 variable:"ok"
							};

					this.$http.patch(route+urlProveedor+'/'+id,proveedor).then
					(function(response)
			    	{  	console.log(response);
						this.getProveedores();
						this.getProveedoresInactivos();
						this.Vacio();			
					});

				});
				}//FIN del IF

			},

			eliminarProveedor:function(id){
				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar){
					this.$http.delete(route+urlProveedor+ '/' + id).then
					(function(response){
						this.getProveedores();
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
				this.idproveedor='';
				this.nombres='';
				this.direccion='';
				this.telefono='';
				this.email='';
				this.status='';
				this.Aux_idproveedor='';
				this.editando=false;
			}

   

			

	},//FIN DEL Mehthods



computed:{
		filtroProveedores:function(){
			return this.proveedores.filter((proveedor)=>{
				return proveedor.nombres.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},

		filtroProveedores2:function(){
			return this.proveedoresInactivos.filter((proveedor)=>{
				return proveedor.nombres.toLowerCase().match(this.search.toLowerCase().trim());
			});
		},

		//No es un componente de vue
	}


});
}
window.onload=init;
Vue.config.devtools = true;