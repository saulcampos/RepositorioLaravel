function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlCat='/apiCategorias';
	var Inactivos='/CategoriasInactivos';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apiCategorias',

	created:function()
	{
		this.getCategorias();
		this.getCategoriasInactivos();

	},

	data:{
		categorias:[],
		categoriasInactivos:[],
		idcategoria:"",
		nombre:'',
		descripcion:"",
		status:'',
		editando:false,

		AuxIdcategoria:'',
		buscar:'',
		search:''	//
	},

	methods:{
		getCategorias:function(){
			this.$http.get(route+urlCat).then
			(function(response){
				console.log(response);
				this.categorias=response.data;
			});
		},

		getCategoriasInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.categoriasInactivos=response.data;
			});
		},

		agregarCategoria:function(){				
				var categoria={
							nombre:this.nombre,
							descripcion:this.descripcion,
							status:1
						};

			if (categoria.nombre) {
				this.$http.post(route+urlCat,categoria).then
				(function(response){
					this.Vacio();
					this.getCategorias(); 
					$('#ventana_modal').modal('hide');
				});

			}
			else
					alert("El campo nombre no puede ser vacio");
	
			},

				

		


		editCategoria:function(id){
				
				this.editando=true;
				$('#ventana_modal').modal('show');

				this.$http.get(route+urlCat + '/' + id).then
				(function(response){

					console.log(response);
					this.idcategoria=response.data.idcategoria;
					this.nombre=response.data.nombre;
					this.descripcion=response.data.descripcion;
					this.status=response.data.status;

					this.AuxIdcategoria=response.data.idcategoria					
				});
			},




			updateCategoria:function(id){
				var categoria={
					idcategoria:this.idcategoria,
					nombre:this.nombre,
					descripcion:this.descripcion,
					status:this.status
				}
				

			if (categoria.nombre) 
			{
				this.$http.patch(route+urlCat + '/' + id,categoria).then
				(function(response){
					console.log(response);
						this.editando=false;
						this.Vacio();
						this.getCategorias();
						$('#ventana_modal').modal('hide');					
				});	
			}
			else
				alert("El campo nombre no puede ser vacio");

			},

		    BajaCategoria:function(id){

				var confirmar = confirm("Esta seguro de eliminar el registro?")
				if(confirmar)
				{
				 this.$http.get(route+urlCat+'/'+id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var categoria=
				 		    {						  
						  		status:this.status,
						  		variable:"ok"
							};


					this.$http.patch(route+urlCat+ '/'+ id,categoria).then
					(function(response)
			    	{  	console.log(response);
						this.getCategorias();
						this.getCategoriasInactivos();
						this.Vacio();			
					});

				});
				}//FIN del IF

			},

			eliminarCategoria:function(id){
				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar){//Concatena la id que asamos y se dirije al controlador pars que atraves del id lo elimine
					this.$http.delete(route+urlCat + '/' + id).then
					(function(response){
						this.getCategorias()//Refrescamos la vista
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
				this.editando=false;
				this.idcategoria='';
				this.nombre='';
				this.descripcion='';
				this.status='';
			}

	},//FIN DEL Mehthods


computed:{
		filtroCategorias:function(){
			return this.categorias.filter((categoria)=>{
				return categoria.nombre.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},

		filtroCategorias2:function(){
			return this.categoriasInactivos.filter((categoria)=>{
				return categoria.nombre.toLowerCase().match(this.search.toLowerCase().trim());
			});
		}
	}



});
}
window.onload=init;
Vue.config.devtools = true;