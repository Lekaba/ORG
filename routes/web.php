<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SellerController;
use App\Models\Productos;

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

/* ------------- Admin Route -------------- */

Route::prefix('admin')->group(function (){

Route::get('/login',[AdminController::class, 'Index'])->name('login_from');

Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');

Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');

Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register');

Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');


});




/* ------------- End Admin Route -------------- */




/* ------------- Admin Controllers Route -------------- */

// Route::controller(ProductosController::class)->group(function() {
//     Route::get('/admin/productos/index', 'index')->name('productos.index');
//     Route::get('/admin/productos/export', 'export')->name('productos.export');
//     Route::get('/admin/productos/post', 'post')->name('productos.post');
//     Route::get('/admin/productos/edit/{id}', 'edit')->name('productos.edit');
//     Route::post('/admin/productos/update/{id}', 'update')->name('productos.update');
//     Route::get('/admin/productos/delete/{Id}', 'delete')->name('productos.delete');
//     Route::post('/admin/productos/store', 'store')->name('productos.store');
// });



Route::prefix('productos')->group(function () {

     Route::get('/index', [ProductosController::class, 'index'])->name('productos.index');
     Route::get('/create', [ProductosController::class, 'create'])->name('productos.create');
     Route::post('/store', [ProductosController::class, 'store'])->name('productos.store');
     Route::get('/edit/{id}', [ProductosController::class, 'edit'])->name('productos.edit');
     Route::post('/update/{id}', [ProductosController::class, 'update'])->name('productos.update');
     Route::get('/destroy/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');
 });

 Route::prefix('categorias')->group(function () {

    Route::get('/index', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::get('/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/store', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/edit/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::post('/update/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
    Route::get('/destroy/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
});

/* ------------- End Seller Route -------------- */



Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalogo', function () {
    return view('portfolio');
});

Route::get('/contacto', function () {
    return view('contacto');
});



require __DIR__.'/auth.php';
