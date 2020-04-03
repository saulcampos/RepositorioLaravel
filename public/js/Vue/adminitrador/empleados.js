function init()
{
	var	route = document.querySelector("[name=route]").value;

	var urlEmpleados='/apiEmpleados';
	var Inactivos='/EmpleadosInactivos';
 	var urlPuestos='/apiPuestos';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apiEmpleados',

	created:function()
	{
		this.getEmpleados();
		this.getEmpleadosInactivos();
    	this.getPuestos();

    	
	},


	data:{

    empleados:[],
    empleadosInactivos:[],
    puestos:[],

   //Tabla usuarios 
    idempleado:"",
    nombres:"",
    idpuesto:"",
    status:"",
  	editando:false,  

  	Aux_idempleado:"",
	buscar:'',
	search:''	//
	},

	methods:{
		

		getEmpleados:function(){
			this.$http.get(route+urlEmpleados).then
			(function(response){
				console.log(response);
				this.empleados=response.data;
			});
		},

		getEmpleadosInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.empleadosInactivos=response.data;
			});
		},


		getPuestos:function(){
			this.$http.get(route+urlPuestos).then
			(function(response){
				console.log(response);
				this.puestos=response.data;
			});
		},

    

		agregarEmpleado:function(){

		   var empleado=
				        {
                		  nombres:this.nombres,
                          idpuesto:this.idpuesto,
                          status:1
					     };

					     console.log(empleado);
					     //debugger;
						 if (empleado.nombres && empleado.idpuesto) 
				          {
						    this.$http.post(route+urlEmpleados, empleado).then
						    (function(response)
						     {	console.log(response);						     	
						     	this.Vacio();
							    $('#ventana_modal').modal('hide');
							    this.getEmpleados();	
						      });
						
				         }
				         else
						    alert("Los campos Nombres, Puesto, no pueden ser vacios");


						
						
				
			},



			editEmpleado:function(id){
						this.editando=true;
						$('#ventana_modal').modal('show');

				this.$http.get(route+urlEmpleados + '/' + id).then
				(function(response){

					console.log(response);
					this.idempleado=response.data.idempleado;
					this.nombres=response.data.nombres;
					this.idpuesto=response.data.idpuesto;
					this.status=response.data.status;



					this.Aux_idempleado=response.data.idempleado;					
				});
			},

			updateEmpleado:function(id){
				var empleado={
					      idempleado:this.Aux_idempleado,
                		  nombres:this.nombres,
                          idpuesto:this.idpuesto,
                          status:this.status,
					     };				
			
				this.$http.patch(route+urlEmpleados + '/' + id,empleado).then
				(function(response)
				{console.log(response);
					//debugger;
					this.editando=false;
					$('#ventana_modal').modal('hide');
					this.getEmpleados();
					this.Vacio();
					
				});
			},




				BajaEmpleado:function(id){
				
				var confirmar = confirm("Esta seguro de eliminar el registro?")
				if(confirmar)
				{
				 this.$http.get(route+urlEmpleados + '/' + id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var empleado=
				 		    {						  
						  		status:this.status,
						  		variable:"ok"
							};


					this.$http.patch(route+urlEmpleados+ '/'+ id,empleado).then
					(function(response)
			    	{  	console.log(response);
						this.getEmpleados();
						this.getEmpleadosInactivos();
						this.Vacio();			
					});

				});
				}//FIN del IF

			},

			eliminarEmpleado:function(id){
			
				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar)
				{this.$http.delete(route+urlEmpleados + '/' + id).then
					(function(response){
						this.getEmpleados();
					});
				}

			},











	Vacio:function()
			{
				this.idempleado=''; this.nombres='';
				this.idpuesto=''; this.status='';
				this.editando=false;
			},

	showModal:function()
	        {
				$('#ventana_modal').modal('show');
			},

	Canselar:function()
	        {
	        	this.Vacio();
				$('#ventana_modal').modal('hide');
	           /*location.reload();   */
			},
			

	},//FIN DEL Mehthods



computed:{
		filtroEmpleados:function(){
			return this.empleados.filter((empleado)=>{
				return empleado.nombres.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},

		filtroEmpleados2:function(){
			return this.empleadosInactivos.filter((empleado)=>{
				return empleado.nombres.toLowerCase().match(this.search.toLowerCase().trim());
			});
		}

		//No es un componente de vue
	}


});
}
window.onload=init;
Vue.config.devtools = true;


