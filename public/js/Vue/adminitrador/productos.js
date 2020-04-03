function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlProductos='/apiProductos';
	var Inactivos='/ProductosInactivos';
	var urlCat='/apiCategorias';

new Vue({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

	el:'#apiProductos',

	created:function()
	{
		this.getProductos();
		this.getCategorias();
		this.getProductosInactivos();
	
	},

	data:{

		//Tbla productos
		productos:[],
		productosInactivos:[],
    	idproducto:"",
	   	nombre:"",
	   	stockmin:"",
	   	stockmax:"",
        precio_venta:"",
	   	precio_compra:"",
	   	descripcion:"",
	   	foto:"",
	   	status:"",
	   	idcategoria:"",

	   	//tabla categorias
	   	categorias:[],



		AuxIdproducto:"",
		editando:false,
		check:false,
	
		buscar:'',
		search:''	//
	},

	methods:{
		getProductos:function(){
			this.$http.get(route+urlProductos).then
			(function(response){
				console.log(response);
				this.productos=response.data;
			});
		},

		getProductosInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.productosInactivos=response.data;
			});
		},


		getCategorias:function(){
			this.$http.get(route+urlCat).then
			(function(response){
				console.log(response);
				this.categorias=response.data;
			});
		},


		agregarProducto:function(){	

		if (this.check)//console.log("El producto no tiene un codgio de barras");
			this.idproducto=moment().format('YYYYYYYYhmms');	
		/*else
		console.log("Si tiene un codgio de barras");*/
				var producto={
					idproducto:this.idproducto,
					nombre:this.nombre,
					stockmin:this.stockmin,
					stockmax:this.stockmax,
					precio_venta:this.precio_venta,
					precio_compra:this.precio_compra,
					descripcion:this.descripcion,
					foto:this.foto,
					status:1,
					idcategoria:this.idcategoria
				};
				

			if (producto.nombre && producto.idcategoria) 
			{
				this.$http.post(route+urlProductos,producto).then
				(function(response){
					console.log(response);
					this.Vacio();
					this.getProductos();
					$('#ventana_modal').modal('hide');
				});
			}
			else
				alert("El campo nombre y la categoria no puede estar vacio");

			},


	
		


		editProducto:function(id){
				
				this.editando=true;
				$('#ventana_modal').modal('show');

				this.$http.get(route+urlProductos + '/' + id).then
				(function(response){

					console.log(response);
					this.idproducto=response.data.idproducto,
					this.nombre=response.data.nombre,
					this.stockmin=response.data.stockmin,
					this.stockmax=response.data.stockmax,
					this.precio_venta=response.data.precio_venta,
					this.precio_compra=response.data.precio_compra,
					this.descripcion=response.data.descripcion,
					this.foto=response.data.foto,
					this.status=response.data.status,
					this.idcategoria=response.data.idcategoria,
					
					this.AuxIdproducto=response.data.idproducto					
				});
			},

			updateProducto:function(id){
				var producto={
					idproducto:this.idproducto,
					nombre:this.nombre,
					stockmin:this.stockmin,
					stockmax:this.stockmax,
					precio_compra:this.precio_compra,
					precio_venta:this.precio_venta,
					descripcion:this.descripcion,
					foto:this.foto,
					status:this.status,
					idcategoria:this.idcategoria,
				};
				

			if(producto.nombre) 
			{   this.$http.patch(route+urlProductos + '/' + id,producto).then
				(function(response){
					console.log(response);
					this.getProductos();
					this.editando=false;
					$('#ventana_modal').modal('hide');
					this.Vacio();					
				});
			}
			else
				alert("El campo nombre no puede ser vacio");
			},


			BajaProducto:function(id){
				
				var confirmar = confirm("Esta seguro de eliminar el registro?")
				if(confirmar)
				{
				 this.$http.get(route+urlProductos+'/'+id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var producto=
				 		    {						  
						  		status:this.status,
						  		variable:"ok"
							};


					this.$http.patch(route+urlProductos+ '/'+ id,producto).then
					(function(response)
			    	{  	console.log(response);
						this.getProductos();
						this.getProductosInactivos();
						this.Vacio();			
					});

				});
				}//FIN del IF

			},

		eliminarProducto:function(id){
				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar){//Concatena la id que asamos y se dirije al controlador pars que atraves del id lo elimine
					this.$http.delete(route+urlProductos + '/' + id).then
					(function(response){
						this.getProductos()//Refrescamos la vista
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
				this.idproducto='';
				this.nombre='';
				this.stockmin='';
				this.stockmax='';
				this.precio_venta='';
				this.precio_compra='';
				this.descripcion='';
				this.foto='';
				this.status='';
				this.idcategoria='';
				this.editando=false;
				this.check=false;
			}


	},//FIN DEL Mehthods


computed:{
		filtroProductos:function(){
			return this.productos.filter((producto)=>{
				return producto.nombre.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},

		filtroProductos2:function(){
			return this.productosInactivos.filter((producto)=>{
				return producto.nombre.toLowerCase().match(this.search.toLowerCase().trim());
			});
		}
	}



});
}
window.onload=init;
Vue.config.devtools = true;
