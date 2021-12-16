<?php
namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('marcas', MarcasController::class);
Route::resource('productos', ProductosController::class);

Route::post('upload', [UploadController::class, 'store']);
Route::post('imagenes', [ImagenesController::class, 'store'])->name('imagenes.store');
Route::post('imagenes/update/{id}', [ImagenesController::class, 'update'])->name('imagenes.update');
Route::delete('imagenes/delete/{id}', [ImagenesController::class, 'destroy'])->name('imagenes.destroy');