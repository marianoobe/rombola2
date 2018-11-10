<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function () {return redirect ('login');});

//Route::get('/', 'ClienteController@inicio');

Route::get('login',['as' => 'login',function () { return view('adminlte::auth.login');}]);

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
    Route::get('/home', 'HomeController@index');
    Route::get('prueba', 'HomeController@prueba')->name('pepe');
    Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios');
    Route::post('crear_usuario', 'UsuariosController@crear_usuario');
    Route::post('editar_usuario', 'UsuariosController@editar_usuario');
    Route::post('buscar_usuario', 'UsuariosController@buscar_usuario');
    Route::post('borrar_usuario', 'UsuariosController@borrar_usuario');
    Route::post('editar_acceso', 'UsuariosController@editar_acceso');
  

    Route::post('crear_rol', 'UsuariosController@crear_rol');
    Route::post('crear_permiso', 'UsuariosController@crear_permiso');
    Route::post('asignar_permiso', 'UsuariosController@asignar_permiso');
    Route::get('quitar_permiso/{idrol}/{idper}', 'UsuariosController@quitar_permiso');
    
    
    Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
    Route::get('form_nuevo_rol', 'UsuariosController@form_nuevo_rol');
    Route::get('form_nuevo_permiso', 'UsuariosController@form_nuevo_permiso');
    Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
    Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuariosController@confirmacion_borrado_usuario');
    Route::get('asignar_rol/{idusu}/{idrol}', 'UsuariosController@asignar_rol');
    Route::get('quitar_rol/{idusu}/{idrol}', 'UsuariosController@quitar_rol');
    Route::get('form_borrado_usuario/{idusu}', 'UsuariosController@form_borrado_usuario');
    Route::get('borrar_rol/{idrol}', 'UsuariosController@borrar_rol');
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    

Route::resource('listaprecios', 'ListaPrecioController');
Route::resource('cero', 'AutoceroController');

Route::get('autos/{auto}/updateusado','AutomovileController@editusado')->name('updateusado');
Route::get('autos/{auto}/editusado','AutomovileController@editusado')->name('editusado');
Route::get('autos/usados','AutomovileController@usados')->name('usados');
Route::get('autos/createusados','AutomovileController@createusados')->name('agregarusado');

Route::get('/file','FileController@index')->name('viewfile');
Route::get('/file/upload/{id}','FileController@create')->name('formfile');
Route::post('/file/upload','FileController@store')->name('uploadfile');
Route::delete('/file/{id}','FileController@destroy')->name('deletefile');
//Route::get('/file/download/{id}','FileController@show')->name('downloadfile');
//Route::get('/file/email/{id}','FileController@edit')->name('emailfile');
Route::post('/file/dropzone','FileController@dropzone')->name('dropzone');

Route::post('clientefast','ClienteController@store_fast')->name('clientefast');
Route::resource('clientes','ClienteController');
Route::resource('pre-venta','PreventaController');
Route::get('pre-venta/cuotas/{id}','PreventaController@getCuotas');
Route::get('pre-venta/financiera/{id}','PreventaController@getFinanciera');

//Route::get('pdf','PdfController@index')->name('pdf');
//Route::get('generate-pdf', 'PdfController@index')->name('generate-pdf');
Route::get('print/{id}', 'PdfController@pdf')->name('print');
Route::get('print_venta/{id1}/{id2}', 'PdfController@pdf_venta')->name('print_venta');

Route::get('prueba','VentaController@prueba')->name('prueba');

Route::resource('ventacontado','VentaContadoController');

Route::resource('venta','VentaController');

Route::resource('financiera', 'FinancieraController');






Route::resource('autos', 'AutomovileController');
});
Route::post('prueba', 'HomeController@prueba')->name('prueba');

Route::get('/prueba1', function() {
    return View::make('adminlte::home-table');
});

?>