<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PcoductoController;
use App\Http\Controllers\PpoductoController;
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

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/header', function () {
    return view('headerGeneral');
});

Route::get('/footer', function () {
    return view('footerGeneral');
});

Route::get('/productosFrescos', function () {
    return view('productosFrescos');
})->name('pFrescos');

Route::get('/productosCongelados', function () {
    return view('productosCongelados');
})->name('pConge');

Route::get('/productosCuidado', function () {
    return view('productosCuidado');
})->name('pCuida');

Route::get('/productosHogar', function () {
    return view('productosHogar');
})->name('pHogar');

Route::get('/productosMascotas', function () {
    return view('productosMascotas');
})->name('pMascotas');

Route::get('/sobreNosotros', function () {
    return view('snosotros');
})->name('snosotros');

Route::group([], function(){
    Route::resource('/productos', ProductoController::class);
    Route::get('/productosFRESCOSADMIN', [ProductoController::class, 'index'])->name('productos');
    Route::get('/productosFrescos', [ProductoController::class, 'pFrescos'])->name('pFrescos');
});

Route::group([], function(){
    Route::resource('/pcoductos', PcoductoController::class);
    Route::get('/productosCADMIN', [PcoductoController::class, 'index'])->name('pcoductos');
    Route::get('/productosCongelados', [PcoductoController::class, 'pConge'])->name('pConge');
});

Route::group([], function(){
    Route::resource('/ppoductos', PpoductoController::class);
    Route::get('/productosPADMIN', [PpoductoController::class, 'index'])->name('ppoductos');
    Route::get('/productosCuidado', [PpoductoController::class, 'pCuida'])->name('pCuida');
});

Route::get('/productosSECRETOEDITAR', function () {
    return view('editar');
})->name('editar');