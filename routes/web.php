<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PcoductoController;
use App\Http\Controllers\PpoductoController;
use App\Http\Controllers\PhoductoController;
use App\Http\Controllers\PmoductoController;
use App\Http\Controllers\PbebidaController;
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
});

Route::get('/inicio', function () {
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

Route::get('/productosBebidas', function () {
    return view('productosBebidas');
})->name('pBebidas');

Route::get('/sobreNosotros', function () {
    return view('snosotros');
})->name('snosotros');

Route::group([], function(){
    Route::resource('/productos', ProductoController::class);
    Route::get('/CQ/yPaDdNfbPw+sZTuxcQ2Qt3bTeOsY33cy0z6y2ZOM', [ProductoController::class, 'index'])->name('productos');
    Route::get('/productosFrescos', [ProductoController::class, 'pFrescos'])->name('pFrescos');
});

Route::group([], function(){
    Route::resource('/pcoductos', PcoductoController::class);
    Route::get('/53CHUT7CmPGWR4uwN/fWxVl70dH3nlB63N431jTPfJ0ySXwEdDryTxMI75cJ49C+aChr/P6fzDsUK99owVMMzsIZslZOWtQ23EiCskmkyKE', [PcoductoController::class, 'index'])->name('pcoductos');
    Route::get('/productosCongelados', [PcoductoController::class, 'pConge'])->name('pConge');
});

Route::group([], function(){
    Route::resource('/ppoductos', PpoductoController::class);
    Route::get('/NR/MAh9Hh+HmrB66xpHuFxiTuGcMurOinwHDVWftfb/3VenkPHkrpKYTkDaqdfSh5DeFIyk9pJRJQWUVb7CK1HZJ97OeA2SC6wBsKOeesaz8vRjGJjNwRwpyQZm0ttb8H6t8+cRvpDU1mf//p9MPoWt9PgLd19VcbBZw501TjroUOkvwWlRXEsMNvS6Fb6yP', [PpoductoController::class, 'index'])->name('ppoductos');
    Route::get('/productosCuidado', [PpoductoController::class, 'pCuida'])->name('pCuida');
});

Route::group([], function(){
    Route::resource('/phoductos', PhoductoController::class);
    Route::get('/WSjwo++9TUZcgjA3YuxsbR5QkEa/tITxvCd8h1NVpkSgKu92YC6PYay5uaZEVarqKAXKn6JikrrahVpLxh2tHDis8rJOlsW5fps1HdFMiwmbUKtDgcKuMuKLrSitsK/6tZG1tjiLPpuH7eUlUzu0uRSTyUpCIfH+X4WFY+9gAKO4JhTO1cN4Ck6a7f3FfnJTDHMkh8YHZubPLFHXLTcG1M1Rx4/C6nOTtw5s5n5B0lPhz0Ez50wsi0GdbIZudR8r0rtfUBTBXz5PQsNjwKJ8W30MJun0HF0XJiXmJSQhnko', [PhoductoController::class, 'index'])->name('phoductos');
    Route::get('/productosHogar', [PhoductoController::class, 'pHogar'])->name('pHogar');
});

Route::group([], function(){
    Route::resource('/pmoductos', PmoductoController::class);
    Route::get('/M2+EtggJUNX/aE6x3PZEDx1Sd0tXwzpD865ARDeHDofiWgC+gHeLca4dWggziwASnTzLj/3RlYv6dOJC/gp8GNLzwP4wbSC8ifc6ieuoZIxWUQwdqKUkY+8ZX0dFQDy0gVNQriUp+yLfeKVOesGoUZI7hTLBNM4uv8JjUx4QTCe5cQwZSFbfjdiFhIXmS9IM5OtvQFthHBm3LAPwfuslON/PukgUKyoWpT3BWUi7BkeCknIq2a4G2VvrA403tO57CP74dPqyAHcYpUawF0D/w+Yte9hzwZ+c2J6+zd+efTt3uinpAKvG1DBOVlf5XSV9ufLuYyqrfziO37Mz4k31YfN4Ah3bd3za7xbXgX43WymCkcqbD/bxh13bKpArd+xzdNTx820GHnif/QQwqU9oustpGxkAyVkxcUW8EDYyTIE5vCAnHao+IJgNqj6DpAKF', [PmoductoController::class, 'index'])->name('pmoductos');
    Route::get('/productosMascotas', [PmoductoController::class, 'pMascotas'])->name('pMascotas');
});

Route::group([], function(){
    Route::resource('/pbebidas', PbebidaController::class);
    Route::get('/lol', [PbebidaController::class, 'index'])->name('pbebidas');
    Route::get('/productosBebidas', [PbebidaController::class, 'pBebidas'])->name('pBebidas');
});

Route::get('/productosSECRETOEDITAR', function () {
    return view('editar');
})->name('editar');

Route::get('/carrito', [ProductoController::class, 'showCarrito'])->name('carrito.show');
Route::get('carrito', [ProductoController::class, 'productoCarrito'])->name('carrito');
Route::get('deleteCartItem/{id}', [ProductoController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::get('emptyCart', [ProductoController::class, 'emptyCart'])->name('emptyCart');

Auth::routes();
Route::get('/producto/{id}', [ProductoController::class, 'agregaralcarrito'])->name('agregaralcarrito');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
