<?php




//Ruta de Logueo --------------------------------------
Route::get('/', function () {
   return view('login/login');});

Route::post('validar','AccesoController@validar');
Route::get('salir','AccesoController@logout');

//<Ruta de Logueo -------------------------------------->


//Rutas de cajero










//RUTAS ADMINISTRADOR
Route::get('HomeA', 'RoutsViewsAdminController@HomeA');

Route::apiResource('apiUsuarios', 'apiUsuariosController');
Route::get('Usuarios', 'RoutsViewsAdminController@Usuarios');
Route::get('UsuariosInactivos',[
	'as'=>'UsuariosInactivos',
	'uses'=>'apiUsuariosController@UsuariosInactivos'
]);

Route::apiResource('apiRoles','apiRolesController');
Route::get('Roles','RoutsViewsAdminController@Roles');
Route::get('RolesInactivos',[
	'as'=>'RolesInactivos',
	'uses'=>'apiRolesController@RolesInactivos'
]);


Route::apiResource('apiClientes','apiClientesController');
Route::get('Clientes','RoutsViewsAdminController@Clientes');
Route::get('ClientesInactivos',[
	'as'=>'ClientesInactivos',
	'uses'=>'apiClientesController@ClientesInactivos']);

	Route::apiResource('apiProveedores','apiProveedoresController');
	Route::get('Proveedores','RoutsViewsAdminController@Proveedores');
	Route::get('ProveedoresInactivos',[
		'as'=>'ProveedoresInactivos',
		'uses'=>'apiProveedoresController@ProveedoresInactivos'	]);

		Route::apiResource('apiGallineros','apiGallinerosController');
		Route::get('Gallineros','RoutsViewsAdminController@Gallineros');

Route::apiResource('apiServicios','apiServiciosController');
Route::get('Servicios','RoutsViewsAdminController@Servicios');
Route::get('ServiciosInactivos',[
	'as'=>'ServiciosInactivos',
	'uses'=>'apiServiciosController@ServiciosInactivos']);

	Route::apiResource('apiEmpleados','apiEmpleadosController');
	Route::get('Empleados','RoutsViewsAdminController@Empleados');
	Route::get('EmpleadosInactivos',[
	'as'=>'EmpleadosInactivos',
	'uses'=>'apiEmpleadosController@EmpleadosInactivos'	]);

		Route::apiResource('apiPuestos','apiPuestosController');
		Route::get('Puestos','RoutsViewsAdminController@Puestos');
		Route::get('PuestosInactivos',[ 
			'as'=>'PuestosInactivos',
			'uses'=>'apiPuestosController@PuestosInactivos']);

Route::get('Almacen', 'RoutsViewsAdminController@Almacen');

	Route::apiResource('apiProductos','apiProductosController');
	Route::get('Producto', 'RoutsViewsAdminController@Productos');
	Route::get('ProductosInactivos',[
	'as'=>'ProductosInactivos',
	'uses'=>'apiProductosController@ProductosInactivos']);

		Route::apiResource('apiCategorias','apiCategoriasController');
		Route::get('Categorias', 'RoutsViewsAdminController@Categorias');
		Route::get('CategoriasInactivos',[
		'as'=>'CategoriasInactivos',
		'uses'=>'apiCategoriasController@CategoriasInactivos']);



//Rutas de usuarios
Route::get('HomeB', 'RoutsViewsUsersController@HomeB');

Route::apiResource('apiCostos','apiCostosController');
Route::get('Costos', 'RoutsViewsUsersController@Costos');
Route::get('DetalleCosotos/{id}',[
	'as'=>'DetalleCostos',
	'uses'=>'apiCostosController@DetalleCosotos'
]);

Route::get('Eliminar/{id}',[
	'as'=>'Eliminar',
	'uses'=>'apiCostosController@Eliminar']);


Route::get('Almacen', 'RoutsViewsUsersController@Almacen');
Route::apiResource('apiAlmacen','apiAlmacenController');
Route::get('DetalleAlmacen/{id}',[
	'as'=>'DetalleAlmacen',
	'uses'=>'apiAlmacenController@DetalleAlmacen']);


Route::get('EliminarDAlmacen/{id}',[
	'as'=>'EliminarDAlmacen',
	'uses'=>'apiAlmacenController@EliminarDAlmacen']);

Route::get('Galpones', 'RoutsViewsUsersController@Galpones');

?>
