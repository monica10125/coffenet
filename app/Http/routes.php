<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'as'=>'index',
	'uses'=>'carucelController@index']);


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

		//perfin aparte tenga en cuenta que para acceder al grupo de rutas primero debe colocar el nombre del prefijo

	  Route::resource('perfil','perfilController');
	    
	  Route::resource('telefono','telefonoController');
	  Route::get('telefono/{id}/destroy',[
	  		'uses'=>'telefonoController@destroy',
	  		'as'=>'admin.telefono.destroy'
	  	]);
	  //admin
	  Route::group(['middleware'=>'admin'],function(){

	  Route::resource('usuarios','Users');
	  Route::get('usuarios/{id}/destroy',[
	  		'uses'=>'Users@destroy',
	  		'as'=>'admin.usuarios.destroy'
	  	]);

	  Route::resource('sucursales','SucursalesControll');
	  Route::get('sucursales/{id}/destroy',[
	  		'uses'=>'SucursalesControll@destroy',
	  		'as'=>'admin.sucursales.destroy'
	  	]);

	  Route::resource('baner','banerController');
	   Route::get('baner/{id}/destroy',[
	  		'uses'=>'banerController@destroy',
	  		'as'=>'admin.baner.destroy'
	  	]);
	  Route::resource('productos','productosController');
	  Route::get('productos/{id}/destroy',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
	  		'uses'=>'productosController@destroy', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
	  		'as'=>'admin.productos.destroy' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
	  	]);
		  Route::get('pdf',[
				  'uses'=>'productosController@generarPdf',
				  'as'=>'admin.pdf'
		  ]);



		  Route::resource('inventarios','InventarioController');// trae todos los metodos del controoller
		  Route::get('inventarios/{id}/destroy',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
				  'uses'=>'InventarioController@destroy', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
				  'as'=>'admin.inventarios.destroy' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
		  ]);

		  Route::resource('menu','MenuController');
		  Route::get('menus/{id}/destroy',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
				  'uses'=>'MenuController@destroy', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
				  'as'=>'admin.menus.destroy' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
		  ]);


          Route::get('facturas/gestionarFacturas',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
              'uses'=>'PedidosController@verPedidosAdmi', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
              'as'=>'admin.pedidos.verPedidosAdmi' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
          ]);

          Route::get('facturas/{id}/crearFactura',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
              'uses'=>'FacturasController@crearFactura', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
              'as'=>'admin.facturas.crearFactura' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
          ]);

          Route::get('facturas/{id}/eliminarOrden',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
              'uses'=>'FacturasController@eliminarOrden', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
              'as'=>'admin.facturas.eliminarOrden' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
          ]);
	  });
});
//logeo
Route::auth();
Route::get('/home', 'HomeController@index');

Route::resource('registor','registroUser');

Route::get('admin/auth/login',[
	'uses'=>'Auth\AuthController@getLogin',
	'as' =>'admin.auth.login'
	]);
Route::post('admin/auth/login',[
	'uses'=>'Auth\AuthController@postLogin',
	'as' =>'admin.auth.login'
	]);
Route::get('admin/auth/logout',[
	'uses'=>'Auth\AuthController@getLogout',
	'as' =>'admin.auth.logout'
	]);
//cliente
Route::group(['prefix'=>'cliente','middleware'=>'auth'],function(){




	Route::post('pedidos/retonarPrecio',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
			'uses'=>'PedidosController@retonarPrecio', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
			'as'=>'cliente.pedidos.retonarprecio' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
	]);

	Route::get('pedidos/index',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
			'uses'=>'PedidosController@index', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
			'as'=>'cliente.pedidos.index' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
	]);


    Route::get('pedidos/{id}/create',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
        'uses'=>'PedidosController@create', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
        'as'=>'cliente.pedidos.create' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
    ]);

    Route::post('pedidos/store',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
        'uses'=>'PedidosController@store', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
        'as'=>'cliente.pedidos.store' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
    ]);

    Route::get('pedidos/{id}/show',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
        'uses'=>'PedidosController@show', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
        'as'=>'cliente.pedidos.show' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
    ]);


	Route::get('pedidos/destroyMenu',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
			'uses'=>'PedidosController@destroyMenu', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
			'as'=>'cliente.pedidos.destroyMenu' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
	]);


	Route::get('pedidos/solicitarDomicilio',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
			'uses'=>'PedidosController@solicitarDomicilio', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
			'as'=>'cliente.pedidos.solicitarDomicilio' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
	]);


    Route::get('pedidos/verPedidos',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
        'uses'=>'PedidosController@verPedidos', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
        'as'=>'cliente.pedidos.verPedidos' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
    ]);

    Route::get('pedidos/{id}/eliminarOrden',[ //la ruta esta recibiendo un id esta es la identificacion de la ruta para que la ruta tome el valor como opcional se podra al final del parametro ?
        'uses'=>'PedidosController@eliminarPedido', // de esta manera se invoca el controlador el @ invoca el metodo que utiliza
        'as'=>'cliente.pedidos.eliminarPedido' // este es el nombre de la ruta  conclusion daniel esta llama las funciones de los controladores desde este archivo por eso colo admin es el nombre de la ruta le pone un punto para acceder al metodo
    ]);



});

Route::get('sucursales/retonarSucursales',[
		'uses'=>'SucursalesControll@retonarSucursales',
		'as'=>'sucursales.retonarSucursales'
]);


/*Route::get('prueba/{nombre}',function($nombre){
	echo "esto es una prueba".$nombre;
});
esta es una ruta para aclarar que la variable se recibira desde la url se pone /
*/
