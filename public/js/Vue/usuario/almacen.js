function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlAlmacen='/apiAlmacen';
	var urlProductos='/apiProductos';
	var urlProveedor='/apiProveedores';

new Vue({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

	el:'#apiAlmacen',

	created:function()
	{
		this.getProveedores();
		this.getAlmacen();
		this.getProductos();
	},

	data:{

	//Tabla de Almacen
	almacen:[],
	idalmacen:'',
	fecha_logica:'',
	fecha:'',
	descripcion:'',
	idproveedor:'',
	total:'',
	AuxIdalmacen:'',

	proveedores:[],
    idproveedor:"",


	//Producto
	productos:[],
	idproducto:'',

   //
    matris:[],
    DAlmacen:[],
    cantidades:[],/*
    seviciosMatris:'',
	detalles:[],*/

	editando:false,
	buscar:''

		
	},

	methods:{
		getAlmacen:function(){
			this.$http.get(route+urlAlmacen).then
			(function(response){
				console.log(response);
				this.almacen=response.data;
			});
		},


		getProductos:function(){
			this.$http.get(route+urlProductos).then
			(function(response){
				console.log(response);
				this.productos=response.data;
			});
		},

		getProveedores:function(){
			this.$http.get(route+urlProveedor).then
			(function(response){
				console.log(response);
				this.proveedores=response.data;
			});
		},







			getProducto:function(id)
		   { 
			if(id)
			{	this.$http.get(route+urlProductos+'/'+id).then
				(function(response){
						console.log(response);
						this.productosMatris=response.data;

							if(this.productosMatris){
								var unProducto={
									'idproducto':response.data.idproducto,
									'nombre':response.data.nombre,
									'precio':response.data.precio_compra,
									'total':0,
									'en_uso':0
								}

								this.matris.push(unProducto);
								this.idproducto=" ";
								console.log(unProducto);
							}
							else
							 alert("El producto no existe");
				});
				
			 } else
			    alert('Selecciona un producto');
		},


		agregarAlmacen:function () {
			for (var i = this.cantidades.length - 1; i >= 0; i--)
		     {  

		     	this.matris[i].total = parseFloat(this.cantidades[i]) * parseFloat(this.matris[i].precio);
		     }


			var almacen=
						{			
							idalmacen:moment().format('MMMMDoYYYYhmmss'),	
							fecha_logica:moment().format('LL'), 
							fecha:moment().format('YYYY-MM-DD'),
							descripcion:this.descripcion,
							idproveedor:this.idproveedor,
							total:this.granTotal,

							
							detalle:this.matris,
							cantidades:this.cantidades
						};
						/*console.log(almacen)*/
					
				if (this.idproveedor && this.cantidades.length > 0 && this.granTotal > 0) {

				this.$http.post(route+urlAlmacen, almacen).then
				(function(response)
				 { 
				 	this.getAlmacen();
					this.Vacio();
					$('#ventana_modal').modal('hide');
					console.log(response);
				 })


				}else
					alert("No puedes inserta sin un Proveedor, Productos o Cantidades nulas");


		},




		showAlmacen:function(id)
		{	/*debugger;*/
			this.editando=true;
			this.showModal();

			this.$http.get(route+urlAlmacen+ '/' + id).then
			(function(response){
				console.log(response);
				this.AuxIdalmacen=response.data.idalmacen;
				this.fecha_logica=response.data.fecha_logica;
				this.descripcion=response.data.descripcion;
				this.idproveedor=response.data.idproveedor;
				this.total=response.data.total;

			});

			
			this.$http.get(route+'/DetalleAlmacen/' + id).then
			(function(response){
				console.log(response);
				this.DAlmacen=response.data;
			});


		},


		eliminarDAlmacen:function(id){
			var confirmar = confirm("Esta seguro de eliminar el registro?")

			if(confirmar){
			this.$http.get(route+'/EliminarDAlmacen/'+ id).then
			(function(response){
				this.eliminarAlmacen(id);
			});
		  }	
		},

		eliminarAlmacen:function(id)
		{	this.$http.delete(route+urlAlmacen + '/' + id).then
			(function(response){
				this.Vacio();
				this.getAlmacen();
				$('#ventana_modal').modal('hide');	
			});
		},

		eliminarProducto:function(id)
		{this.matris.splice(id,1);},	


		showModal:function(){
				$('#ventana_modal').modal('show');//Mostrar un venta modal
			},

			Vacio:function(){
				this.idalmacen='';	
				this.descripcion='';
				this.fecha=''; 
				this.fecha_logica='';
				this.idproveedor='';
				this.total='';

				this.AuxIdalmacen='';
				this.granTotal=0; 		
				this.matris=[];	
				this.editando=false;	
				this.cantidades=[];
				this.DAlmacen=[];
				
			},
		
			Canselar:function()
	        {
	        	this.Vacio();
				$('#ventana_modal').modal('hide');
	           /*location.reload();   */
			},
	



	},//FIN DEL Mehthods


computed:{
		filtroAlmacen:function(){
			return this.almacen.filter((almacen)=>{
				return almacen.fecha_logica.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},
		
			granTotal:function(){
		   var acum = 0;
		   for (var i = this.matris.length - 1; i >= 0; i--)
		     {
		     	acum = acum + (parseFloat(this.matris[i].precio) * parseFloat(this.cantidades[i]) );
		     }
			 return (acum.toFixed(2));
		},
	
	

	Total(){	


		return (id)	=>{	
		var tot=0;

		if (this.matris.length){
			
			tot =this.cantidades[id] * parseFloat(this.matris[id].precio);
			
		}
		return (tot.toFixed(2));
	  }
	}



	},//Fin del computed
});
}
window.onload=init;
Vue.config.devtools = true;

