<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\AsignarController;

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

Route::get('/',function (){
    return view('frontend');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile',[UsuarioController::class,'profile']);
    Route::get('/tables',[PageController::class,'tables']);
    Route::get('frontend',[FrontedController::class,'index'])->name('frontend');
    Route::get('abouted',[FrontedController::class,'abouted'])->name('abouted');
    Route::get('shop',[FrontedController::class,'shop'])->name('shop');
    Route::get('shop',[CarController::class,'showShop'])->name('shop');
    Route::get('contact',[FrontedController::class,'contact'])->name('contact');
    Route::get('single',[FrontedController::class,'single'])->name('single');
    Route::get('/get-car-details/{id}', [CarController::class, 'getCarDetails']);
    Route::get('generate-report',[CarController::class,'generateReport'])->name('generate.report');
    Route::resource('/cars',CarController::class)->names('carros');
    Route::resource('/clients',ClienteController::class)->names('cliente');
    Route::resource('/sales',SaleController::class)->names('venta');
    Route::resource('/roles',RoleController::class)->names('roles');
    Route::resource('/permisos',PermisoController::class)->names('permisos');
    Route::resource('/usuarios',AsignarController::class)->names('asignar');
});
   


