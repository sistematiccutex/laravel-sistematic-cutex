<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;

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

//Proveedores
//listar Proveedor
Route::get('proveedores', [ProvidersController::class, 'index'])->name('proveedores');
//Crear Proveedor
Route::get('proveedores/crear', [ProvidersController::class, 'create'])->name('proveedores.crear');
//Guardar Proveedor
Route::post('proveedores', [ProvidersController::class, 'store'])->name('proveedores.guardar');
//Eliminar Proveedor
Route::delete('proveedores/{id}', [ProvidersController::class, 'destroy'])->name('proveedores.eliminar');
//Detalles Proveedor
Route::get('proveedores/{id}', [ProvidersController::class, 'show'])->name('proveedores.detalles');
//Editar Proveedor
Route::get('proveedores/{id}/editar', [ProvidersController::class, 'edit'])->name('proveedores.editar');
//Actualizar Proveedor
Route::put('proveedores/{id}', [ProvidersController::class, 'update'])->name('proveedores.actualizar');
//Actualizar status Proveedor
Route::put('proveedores-status/{id}', [ProvidersController::class, 'editStatus'])->name('proveedores.estado');

//Productos
//listar Productos
Route::get('productos', [ProductsController::class, 'index'])->name('productos');
//Crear Productos
Route::get('productos/crear', [ProductsController::class, 'create'])->name('productos.crear');
//Guardar Productos
Route::post('productos', [ProductsController::class, 'store'])->name('productos.guardar');
//Eliminar Productos
Route::delete('productos/{id}', [ProductsController::class, 'destroy'])->name('productos.eliminar');
//Detalles Productos
Route::get('productos/{id}', [ProductsController::class, 'show'])->name('productos.detalles');
//Editar Productos
Route::get('productos/{id}/editar', [ProductsController::class, 'edit'])->name('productos.editar');
//Actualizar Productos
Route::put('productos/{id}', [ProductsController::class, 'update'])->name('productos.actualizar');
//Actualizar status Productos
Route::put('productos-status/{id}', [ProductsController::class, 'editStatus'])->name('productos.estado');

//Usuarios
//listar Usuarios
Route::get('usuarios', [UsersController::class, 'index'])->name('usuarios');
//Crear Usuarios
Route::get('usuarios/crear', [UsersController::class, 'create'])->name('usuarios.crear');
//Guardar Usuarios
Route::post('usuarios', [UsersController::class, 'store'])->name('usuarios.guardar');
//Eliminar Usuarios
Route::delete('usuarios/{id}', [UsersController::class, 'destroy'])->name('usuarios.eliminar');
//Detalles Usuarios
Route::get('usuarios/{id}', [UsersController::class, 'show'])->name('usuarios.detalles');
//Editar Usuarios
Route::get('usuarios/{id}/editar', [UsersController::class, 'edit'])->name('usuarios.editar');
//Actualizar Usuarios
Route::put('usuarios/{id}', [UsersController::class, 'update'])->name('usuarios.actualizar');
//Actualizar status Usuarios
Route::put('usuarios-status/{id}', [UsersController::class, 'editStatus'])->name('usuarios.estado');

//Facturas
//listar Facturas
Route::get('facturas', [InvoicesController::class, 'index'])->name('facturas');
//Crear Facturas
Route::get('facturas/crear', [InvoicesController::class, 'create'])->name('facturas.crear');
//Guardar Facturas
Route::post('facturas', [InvoicesController::class, 'store'])->name('facturas.guardar');
//Eliminar Facturas
Route::delete('facturas/{id}', [InvoicesController::class, 'destroy'])->name('facturas.eliminar');
//Detalles Facturas
Route::get('facturas/{id}', [InvoicesController::class, 'show'])->name('facturas.detalles');
//Editar Facturas
Route::get('facturas/{id}/editar', [InvoicesController::class, 'edit'])->name('facturas.editar');
//Actualizar Facturas
Route::put('facturas/{id}', [InvoicesController::class, 'update'])->name('facturas.actualizar');
//Actualizar status Facturas
Route::put('facturas-status/{id}', [InvoicesController::class, 'editStatus'])->name('facturas.estado');

//Colores
//Listar colores
Route::get('colores', [ColorsController::class, 'index'])->name('colores');
//Crear Color
Route::get('colores/crear', [ColorsController::class, 'create'])->name('colores.crear');
//Guardar Color
Route::post('colores', [ColorsController::class, 'store'])->name('colores.guardar');
//Eliminar Color
Route::delete('colores/{id}', [ColorsController::class, 'destroy'])->name('colores.eliminar');
//Detalles Color
Route::get('colores/{id}', [ColorsController::class, 'show'])->name('colores.detalles');
//Editar Color
Route::get('colores/{id}/editar', [ColorsController::class, 'edit'])->name('colores.editar');
//Actualizar Color
Route::put('colores/{id}', [ColorsController::class, 'update'])->name('colores.actualizar');
//Actualizar status Color
Route::put('colores-status/{id}', [ColorsController::class, 'editStatus'])->name('colores.estado');
