<?php
//agrupamos las rutas con el prefijo Admin ya que todo llevará admin
Route::group([
	'prefix'=>'Admin',
	'namespace'=>'Admin',
	'middleware'=>'auth'],
function()
{
    //esta ruta es para que 
	Route::get('/','AdminController@index')->name('dashboard');	
	Route::resource('productos', 'ProductosController',['except'=>'show']);

	//rutas de las ventas
	Route::get('/ventas','VentasSessionController@index');
	Route::post('/ventas','VentasSessionController@store');
	Route::post('/ventasItem/{item}','VentasSessionController@destroyItem');
	Route::delete('/ventas','VentasSessionController@destroy');

});

// rutas de autenticación
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//si quieren acceder a cualquier otra ruta desde el navegador los enviaría a la ruta dashboard
Route::get('/{any?}',function()
	{
		return redirect()->route('dashboard');
	})->where('any','.*');
