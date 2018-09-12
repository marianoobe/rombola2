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

Route::get('/',function () {
    return redirect ('login');
});

Route::get('login',['as' => 'login',function () {
    return view('adminlte::auth.login');
}]);

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('clientes', function () {
    return view('clientes');
})->name('clientes');

Route::get('pre-venta', function () {
    return view('pre-venta');
})->name('pre-venta');

