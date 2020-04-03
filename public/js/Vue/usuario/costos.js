function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlCostos='/apiCostos';
	var urlSer='/apiServicios';

new Vue({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

	el:'#apiCostos',

	created:function()
	{
		this.getCostos();
		this.getServicios();
	},

	data:{

	//Tabla de costos
	costos:[],
	idcosto:'',
	descripcion:'Escribe una descripcion (OPCIONAL)',
	fecha:'',
	fecha_logica:'',
	total:'',
	AuxIdcosto:'',


	


	//Servicos
	servicios:[],
	idservicio:'',

   //
    matris:[],
    DCostos:[],
    precios:[],
    seviciosMatris:'',
	detalles:[],


	
	editando:false,
	buscar:''

		
	},

	methods:{
		getCostos:function(){
			this.$http.get(route+urlCostos).then
			(function(response){
				console.log(response);
				this.costos=response.data;
			});
		},


		getServicios:function(){
			this.$http.get(route+urlSer).then
			(function(response){
				console.log(response);
				this.servicios=response.data;
			});
		},








			getServicio:function(id)
		   { 
			if(id)
			{	this.$http.get(route+urlSer+'/'+id).then
				(function(response){
						console.log(response);
						this.seviciosMatris=response.data;

							if(this.seviciosMatris){
								var unServicio={
									'idservicio':response.data.idservicio,
									'nombre':response.data.nombre
								}

								this.matris.push(unServicio);
								this.idservicio=" ";
								console.log(unServicio);
							}
							else
							 alert("El servicio no existe");
				});
				
			 } else
			    alert('Selecciona un servcio prfavor');
		},


		agregarCosto:function () {
			var costo=
						{			
							idcosto:moment().format('MMMMDoYYYYhmmss'),	
							fecha:moment().format('YYYY-MM-DD'),
							fecha_logica:moment().format('LL'), 
							descripcion:this.descripcion,
							total:this.granTotal,

							precios:this.precios,
							detalle:this.matris
						};
				
				if (this.descripcion && this.precios.length > 0 && this.granTotal > 0) {

				this.$http.post(route+urlCostos, costo).then
				(function(response)
				 { 
				 	this.getCostos();
					this.Vacio();
					$('#ventana_modal').modal('hide');
					console.log(response);
				 })


				}else
					alert("Los valores de los sevicios no pueden ser vacios");


		},




		showCosto:function(id)
		{	/*debugger;*/
			this.editando=true;
			this.showModal();

			this.$http.get(route+urlCostos+ '/' + id).then
			(function(response){
				console.log(response);
				this.AuxIdcosto=response.data.idcosto;
				this.descripcion=response.data.descripcion;
				this.fecha_logica=response.data.fecha_logica;
				this.total=response.data.total;

			});

			
			this.$http.get(route+'/DetalleCosotos/' + id).then
			(function(response){
				console.log(response);
				this.DCostos=response.data;
			});


		},




		eliminarDCosto:function(id){
			var confirmar = confirm("Esta seguro de eliminar el registro?")

			if(confirmar){
			this.$http.get(route+'/Eliminar/'+ id).then
			(function(response){
				this.eliminarCosto(id);
			});
		  }	
		},

		eliminarCosto:function(id)
		{	this.$http.delete(route+urlCostos + '/' + id).then
			(function(response){
				this.Vacio();
				this.getCostos();
				$('#ventana_modal').modal('hide');	
			});
		},

		eliminarServicio:function(id)
		{this.matris.splice(id,1);},	


		showModal:function(){
				$('#ventana_modal').modal('show');//Mostrar un venta modal
			},

			Vacio:function(){
				this.idcosto='';	
				this.descripcion='Escribe una descripcion (OPCIONAL)';
				this.fecha=''; 
				this.fecha_logica='';
				this.total='';

				this.AuxIdcosto='';
				this.granTotal=0; 		
				this.matris=[];
				this.DCostos=[];	
				this.editando=false;	
				this.precios=[];
				
			},
		
			Canselar:function()
	        {
	        	this.Vacio();
				$('#ventana_modal').modal('hide');
	           /*location.reload();   */
			},
	



	},//FIN DEL Mehthods


computed:{
		filtroCostos:function(){
			return this.costos.filter((costo)=>{
				return costo.fecha_logica.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},

			granTotal:function(){

		   var acum = 0;
		   for (var i = this.precios.length - 1; i >= 0; i--)
		     {
		     	acum = acum + parseFloat(this.precios[i]);
		     }
			 return (acum.toFixed(2));
		}
	},//Fin del computed





});
}
window.onload=init;
Vue.config.devtools = true;
