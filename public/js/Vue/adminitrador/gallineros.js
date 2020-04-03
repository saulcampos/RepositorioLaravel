function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlGalli='/apiGallineros';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apigalli',

	created:function()
	{
		this.getGallineros();
	},

	data:{
		gallineros:[],
		idgallinero:"",
		nombre:'',
		observaciones:'',
		cantidad:'',
		status:'',
		AuxIdgallinero:"",
		editando:false,
		buscar:''
	},

	methods:{
		getGallineros:function(){
			this.$http.get(route+urlGalli).then
			(function(response){
				console.log(response);
				this.gallineros=response.data;
			});
		},


		agregarGallinero:function(){				
				var gallinero={
						  nombre:this.nombre,
						  observaciones:this.observaciones,
						  cantidad:this.cantidad,
						  status:1
						};
				

			if (gallinero.nombre) {
				this.$http.post(route+urlGalli,gallinero).then
				(function(response){
					$('#ventana_modal').modal('hide');
					this.Vacio();
					this.getGallineros();//AWAYS END
				});
			}
			else
				alert("El campo nombre no puede ser vacio");	
			},

			CerrarModal:function(){
				$('#view_modal').modal('hide');
					this.Vacio();
			},
			

	
		editGallinero:function(id){
				
				this.editando=true;
				$('#ventana_modal').modal('show');

		
				this.$http.get(route+urlGalli + '/' + id).then
				(function(response){

					console.log(response);
					this.idgallinero=response.data.idgallinero;
					this.nombre=response.data.nombre;
					this.observaciones=response.data.observaciones;
					this.cantidad=response.data.cantidad;
					this.status=response.data.status;


					this.AuxIdgallinero=response.data.idgallinero					
				});
			},

			updateGallinero:function(id){

				var gallinero={
						  nombre:this.nombre,
						  observaciones:this.observaciones,
						  cantidad:this.cantidad,
						  statys:1
						};

			if (gallinero.nombre) 
			{	this.$http.patch(route+urlGalli + '/' + id,gallinero).then
				(function(response){
					console.log(response);
					this.getGallineros();
					this.editando=false;
					$('#ventana_modal').modal('hide');
					this.Vacio();
									
				});
			}
			else
				alert("El campo nombre no puede ser vacio");

			},



			BajaGallinero:function(id) {

				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar)
				{
				this.$http.get(route+urlGalli + '/' + id).then
				(function(response){
					console.log(response);
					this.status=response.data.status;


					if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 	var gallinero={						  
						  status:this.status,
						  variable:"ok"
						};
					
			 this.$http.patch(route+urlGalli + '/' + id,gallinero).then
				(function(response){
					console.log(response);
					this.getGallineros();
					this.Vacio();				
				});

				});
				}//FIN del IF

			},


		    eliminarGallinero:function(id){
			
				var confirmar = confirm("Esta seguro de eliminar el registro?")
				if(confirmar){
					this.$http.delete(route+urlGalli + '/' + id).then
					(function(response){
						this.getGallineros()
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
				this.idgallinero='';
				this.nombre='';
				this.observaciones='';
				this.cantidad='';
				this.status='';
				this.editando=false;
			}

	},//FIN DEL Mehthods


computed:{
		filtroGallineros:function(){
			return this.gallineros.filter((gallinero)=>{
				return gallinero.nombre.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		}
	}



});
}
window.onload=init;
Vue.config.devtools = true;