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
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('auth.login');
});



// Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

////Route::stration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

////Route::word Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout'); 

Route::resource('principal','PrincipalController');

Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');

Route::resource('venta/cliente','ClienteController');


Route::get('venta/consultarReniec','ClienteController@buscarDni')->name('consultar.reniec');
Route::get('venta/consultarSunat','ClienteController@buscarRuc')->name('consultar.sunat');
Route::get('compra/consultarReniec','ProveedorController@buscarDni')->name('consultar1.reniec');
Route::get('compra/consultarSunat','ProveedorController@buscarRuc')->name('consultar1.sunat');

Route::resource('compra/proveedor','ProveedorController');
Route::resource('compra/ingreso','IngresoController');
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('configuracion/inicio','ConfiguracionController');

Route::resource('ventas/venta','VentaController');


