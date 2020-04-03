function init()
{
	var	route = document.querySelector("[name=route]").value;
	var urlEmpleados='/apiEmpleados';
	var urlUsuario='/apiUsuarios';
	var Inactivos='/UsuariosInactivos';
 	var urlRol='/apiRoles';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#apiusuarios',

	created:function()
	{
		this.getEmpleados();
		this.getUsuarios();
		this.getUsuariosInactivos();
    	this.getRoles();

    	
	},


	data:{

    usuarios:[],
    usuariosInactivos:[],
    empleados:[],
    roles:[],

   //Tabla usuarios 
    idrol:"",
    idempleado:"",
    nickname:"",
    idempleado:"",
    password:"",
    foto:"",
    status:"",
  	editando:false,
  	


  	Aux_nickname:"",
  	buscar:'',
  	search:''
  	},

	methods:{
		

		getUsuarios:function(){
			this.$http.get(route+urlUsuario).then
			(function(response){
				console.log(response);
				this.usuarios=response.data;
			});
		},

		getUsuariosInactivos:function(){
			this.$http.get(route+Inactivos).then
			(function(response){
				console.log(response);
				this.usuariosInactivos=response.data;
			});
		},


    getRoles:function(){
			this.$http.get(route+urlRol).then
			(function(response){
				console.log(response);
				this.roles=response.data;
			});
		},

		getEmpleados:function(){
			this.$http.get(route+urlEmpleados).then
			(function(response){
				console.log(response);
				this.empleados=response.data;
			});
		},



		agregarUsuario:function(){

				        var usuario=
				        {
					      nickname:this.nickname,
                		  idempleado:this.idempleado,
                	      password:this.password,
                          idrol:this.idrol,
                          foto:'user3.jpg',
                          status:1
					     };

					     console.log(usuario);

			 		this.$http.get(route+urlUsuario+'/'+this.nickname).then
					(function(response){
						/*console.log(response);*/
						


						if (response.data){
						     /*console.log('Si encontre el id');*/
						     alert("El usuario ya exite");
						
							this.Vacio();
							$('#ventana_modal').modal('hide');
						
						}else{
							/*console.log('No encontre el id');*/
						 if (usuario.nickname && usuario.idempleado  && usuario.idrol) 
				          {
						    this.$http.post(route+urlUsuario, usuario).then
						    (function(response)
						     {	console.log(response);						     	
						     	this.Vacio();
							    $('#ventana_modal').modal('hide');
							    this.getUsuarios();	
						      });
						
				         }
				         else
						    alert("Los campos NICKNAME, NOMBRES, PASSWORD y ROL no pueden ser vacios");


						}
						
					});
			},



		editUsuarios:function(id){
				
						this.editando=true;
						$('#ventana_modal').modal('show');

				this.$http.get(route+urlUsuario + '/' + id).then
				(function(response){

					console.log(response);
					this.nickname=response.data.nickname;
					this.idempleado=response.data.idempleado;
					this.password=response.data.password;
					this.idrol=response.data.idrol;
					this.foto=response.data.foto;
					this.status=response.data.status;



					this.Aux_nickname=response.data.nickname;					
				});
			},

			updateUsuario:function(id){
				var usuario={
					      nickname:this.Aux_nickname,
                		  idempleado:this.idempleado,
                	      password:this.password,
                          idrol:this.idrol,
                          status:this.status,
                          foto:this.foto,
					     };				
			
				this.$http.patch(route+urlUsuario + '/' + id,usuario).then
				(function(response)
				{console.log(response);
					//debugger;
					/*this.editando=false;
					$('#ventana_modal').modal('hide');
					this.getUsuarios();
					this.Vacio();*/
					location.reload();
				});
			},




				BajaUsuario:function(id){
				
				var confirmar = confirm("Esta seguro de eliminar el registro?")
				if(confirmar)
				{
				 this.$http.get(route+urlUsuario + '/' + id).then
				 (function(response){
						console.log(response);
						this.status=response.data.status;

						if (this.status == 1)	
				 			this.status=0;
						else	
				 			this.status=1;

				 		var usuario=
				 		    {						  
						  		status:this.status,
						  		variable:"ok"
							};


					this.$http.patch(route+urlUsuario+ '/'+ id,usuario).then
					(function(response)
			    	{  	console.log(response);
						this.getUsuarios();
						this.getUsuariosInactivos();
						this.Vacio();			
					});

				});
				}//FIN del IF

			},

			eliminarUsuario:function(id){
			
				var confirmar = confirm("Esta seguro de eliminar el registro?")

				if(confirmar)
				{this.$http.delete(route+urlUsuario + '/' + id).then
					(function(response){
						this.getUsuarios();
					});
				}

			},











	Vacio:function()
			{
				this.nickname=''; this.empleados='';
				this.idepleado=''; 
        		this.password=''; this.idrol=''; 
        		this.foto=''; this.status='';
			},

	showModal:function()
	        {
				$('#ventana_modal').modal('show');
			},

	Canselar:function()
	        {/*$('#ventana_modal').modal('hide');*/
	           location.reload();   
			},
			

	},//FIN DEL Mehthods



computed:{
		filtroUsuarios:function(){
			return this.usuarios.filter((usuario)=>{
				return usuario.nickname.toLowerCase().match(this.buscar.toLowerCase().trim());
			});
		},

		filtroUsuarios2:function(){
			return this.usuariosInactivos.filter((usuario)=>{
				return usuario.nickname.toLowerCase().match(this.search.toLowerCase().trim());
			});
		}

	}//Fin de computed


});
}
window.onload=init;
Vue.config.devtools = true;


