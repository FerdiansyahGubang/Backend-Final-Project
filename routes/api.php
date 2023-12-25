<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatbarangController;
use App\Http\Controllers\JenisbarangController;
use App\Http\Controllers\BarangController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Routes for RiwayatbarangController
Route::get('/riwayats', [RiwayatbarangController::class, 'index']);
Route::get('/riwayats/{id}', [RiwayatbarangController::class, 'show']);
Route::post('/riwayats', [RiwayatbarangController::class, 'store']);
Route::put('/riwayats/{id}', [RiwayatbarangController::class, 'update']);
Route::delete('/riwayats/{id}', [RiwayatbarangController::class, 'destroy']);

// Additional routes for JenisbarangController if needed
Route::get('/jenisbarangs', [JenisbarangController::class, 'index']);
Route::get('/jenisbarangs/{id}', [JenisbarangController::class, 'show']);
Route::post('/jenisbarangs', [JenisbarangController::class, 'store']);
Route::put('/jenisbarangs/{id}', [JenisbarangController::class, 'update']);
Route::delete('/jenisbarangs/{id}', [JenisbarangController::class, 'destroy']);

// Routes for BarangController (Tambahkan ini)
Route::get('/barangs', [BarangController::class, 'index']);
Route::get('/barangs/{id}', [BarangController::class, 'show']);
Route::post('/barangs', [BarangController::class, 'store']);
Route::put('/barangs/{id}', [BarangController::class, 'update']);
Route::delete('/barangs/{id}', [BarangController::class, 'destroy']);