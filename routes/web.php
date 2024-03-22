<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\DescuentosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ReportesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VentaController;


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




route::controller(HomeController::class)->group(function(){
    route::get('/','home')->name('home');
    route::get('/welcome','welcome')->name('welcome');
    route::get('/login','login')->name('login');
});

route::controller(ReportesController::class)->group(function(){
    route::get('/reportes','reportes')->name('reportes');
});

route::controller(BarcodeController::class)->group(function(){
    route::get('/barcode','barcode')->name('barcode');
    route::post('/addingbarcode','addingbarcode')->name('addingbarcode');
    route::delete('/deletebarcode/{id}','deletebarcode')->name('deletebarcode');
    route::post('/finishbarcode','finishbarcode')->name('finishbarcode');
});

route::controller(DescuentosController::class)->group(function(){
    route::get('/descuentos','descuentos')->name('descuentos');
    route::get('/editing','editing')->name('editig');
});


route::controller(InventarioController::class)->group(function(){
    route::get('/inventario','inventario')->name('inventario');
    route::get('/adding','adding')->name('adding');
    route::post('/addproduct','addproduct')->name('addproduct');
    route::delete('/deleteitem/{id}','deleteitem')->name('deleteitem');
});

Route::post('/ventas', [VentaController::class, 'store']);