<?php
use App\Http\Controllers\CertificateController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //rutas de certificados
    
    Route::get('certificates/index', [App\Http\Controllers\CertificateController::class, 'index'])->name('certificates.index');
    Route::get('certificates/create', [App\Http\Controllers\CertificateController::class, 'create'])->name('certificates.create');
    Route::post('certificates/create/store', [App\Http\Controllers\CertificateController::class, 'store']);
    Route::get('certificates/{certificate_id}/edit', [App\Http\Controllers\CertificateController::class, 'edit'])->name('certificates.edit');
    Route::post('certificates/{certificate_id}', [App\Http\Controllers\CertificateController::class, 'update']);
    Route::get('certificates/{certificate_id}/destroy', [App\Http\Controllers\CertificateController::class, 'destroy']);
    Route::get('certificates/{certificate_id}/show', [App\Http\Controllers\CertificateController::class, 'show'])->name('certificates.show');
    Route::get('certificates/{certificate_id}/download', [App\Http\Controllers\CertificateController::class, 'download'])->name('certificates.download');
    Route::get('certificates/{certificate_id}/show/ticket', [App\Http\Controllers\CertificateController::class, 'ticket'])->name('certificates.ticket');
    //rutas de clientes
    Route::get('clients/index', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [App\Http\Controllers\ClientController::class, 'create'])->name('clients.create');
    Route::post('clients/create/store', [App\Http\Controllers\ClientController::class, 'store']);
    Route::get('clients/{client_id}/edit', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.edit');
    Route::post('clients/{client_id}', [App\Http\Controllers\ClientController::class, 'update']);
    Route::get('clients/{client_id}/destroy', [App\Http\Controllers\ClientController::class, 'destroy']);
    //rutas de productos de desinfeccion
    Route::get('productdesinfections/index', [App\Http\Controllers\ProductdesinfectionController::class, 'index'])->name('productdesinfections.index');
    Route::get('productdesinfections/create', [App\Http\Controllers\ProductdesinfectionController::class, 'create'])->name('productdesinfections.create');
    Route::post('productdesinfections/create/store', [App\Http\Controllers\ProductdesinfectionController::class, 'store']);
    Route::get('productdesinfections/{productdesinfection_id}/edit', [App\Http\Controllers\ProductdesinfectionController::class, 'edit'])->name('productdesinfections.edit');
    Route::post('productdesinfections/{productdesinfection_id}', [App\Http\Controllers\ProductdesinfectionController::class, 'update']);
    Route::get('productdesinfections/{productdesinfection_id}/destroy', [App\Http\Controllers\ProductdesinfectionController::class, 'destroy']);
    //rutas de productos de limpieza
    Route::get('productcleans/index', [App\Http\Controllers\ProductcleanController::class, 'index'])->name('productcleans.index');
    Route::get('productcleans/create', [App\Http\Controllers\ProductcleanController::class, 'create'])->name('productcleans.create');
    Route::post('productcleans/create/store', [App\Http\Controllers\ProductcleanController::class, 'store']);
    Route::get('productcleans/{productclean_id}/edit', [App\Http\Controllers\ProductcleanController::class, 'edit'])->name('productcleans.edit');
    Route::post('productcleans/{productclean_id}', [App\Http\Controllers\ProductcleanController::class, 'update']);
    Route::get('productcleans/{productclean_id}/destroy', [App\Http\Controllers\ProductcleanController::class, 'destroy']);
    //rutas de lugares
    Route::get('places/index', [App\Http\Controllers\PlaceController::class, 'index'])->name('places.index');
    Route::get('places/create', [App\Http\Controllers\PlaceController::class, 'create'])->name('places.create');
    Route::post('places/create/store', [App\Http\Controllers\PlaceController::class, 'store']);
    Route::get('places/{place_id}/edit', [App\Http\Controllers\PlaceController::class, 'edit'])->name('places.edit');
    Route::post('places/{place_id}', [App\Http\Controllers\PlaceController::class, 'update']);
    Route::get('places/{place_id}/destroy', [App\Http\Controllers\PlaceController::class, 'destroy']);
    //rutas de embarcaciones
    Route::get('boats/index', [App\Http\Controllers\BoatController::class, 'index'])->name('boats.index');
    Route::get('boats/create', [App\Http\Controllers\BoatController::class, 'create'])->name('boats.create');
    Route::post('boats/create/store', [App\Http\Controllers\BoatController::class, 'store']);
    Route::get('boats/{boat_id}/edit', [App\Http\Controllers\BoatController::class, 'edit'])->name('boats.edit');
    Route::post('boats/{boat_id}', [App\Http\Controllers\BoatController::class, 'update']);
    Route::get('boats/{boat_id}/destroy', [App\Http\Controllers\BoatController::class, 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
