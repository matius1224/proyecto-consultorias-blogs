<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Livewire\Dashboard::class, 'render'])->name('home');
Route::view('/', 'livewire.dashboard.index')->name('dashboard');
Route::view('/blog', 'livewire.blogs.index')->middleware('auth')->name('blog');
Route::view('/comentarioBlog', 'livewire.blog-comentado.index')->middleware('auth')->name('comentarioBlog');
Route::view('/recursos', 'livewire.recursos.index')->middleware('auth')->name('recursos');
Route::view('/listadoUsuariosXDescarga', 'livewire.listado-usuarios-recursos.index')->middleware('auth')->name('listadoUsuariosXDescarga');
Route::view('/articulos', 'livewire.articulos.index')->middleware('auth')->name('articulos');
Route::view('/listadoUsuariosXDescargaArticulo', 'livewire.listado-usuarios-articulos.index')->middleware('auth')->name('listadoUsuariosXDescargaArticulo');
Route::view('/categorias', 'livewire.categorias.index')->middleware('auth')->name('categorias');
Route::view('/areas', 'livewire.areas.index')->middleware('auth')->name('areas');
Route::view('/consultorias', 'livewire.consultorias.index')->middleware('auth')->name('consultorias');
Route::view('/capacitaciones', 'livewire.capacitaciones.index')->middleware('auth')->name('capacitaciones');
Route::view('/capacitacionesUsuarios', 'livewire.capacitacionesUsuarios.index')->middleware('auth')->name('capacitacionesUsuarios');
Route::view('/capacitacionesIncompany', 'livewire.capacitacionesIncompany.index')->middleware('auth')->name('capacitacionesIncompany');
Route::view('/detalle_blog/{id_blog}', 'livewire.compartir-enlace-blog.index')->name('detalle');
Route::view('capacitacionesDashboard', 'livewire.capacitaciones-dashboard.index')->name('capacitacionesDashboard');
Route::view('consultoriasDashboard', 'livewire.consultorias-dashboard.index')->name('consultoriasDashboard');
Route::view('blogDashboard', 'livewire.blog-dashboard.index')->name('blogDashboard');
Route::view('recursosDashboard', 'livewire.recursos-dashboard.index')->name('recursosDashboard');
Route::view('contactoDashboard', 'livewire.contacto-dashboard.index')->name('contactoDashboard');
Route::view('resenas', 'livewire.resenas.index')->middleware('auth')->name('resenas');
Route::view('dashboard', 'livewire.dashboard.index')->name('dashboard');
