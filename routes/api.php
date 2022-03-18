<?php

use Illuminate\Support\Facades\Route;


require base_path('routes/v1/main.php');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     dd($request->session()->all());
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->group(function () {
//     Route::group([
//         'prefix' => 'admin',
//         'as' => 'admin.',
//         'middleware' => ['role:admin']
//     ], function () {
//         Route::apiResource('fakultas', FakultasContoller::class);
//         Route::apiResource('jurusan', JurusanContoller::class);
//         Route::apiResource('prodi', ProdiController::class);

//         Route::controller(
//             App\Http\Controllers\Api\Admin\MataKuliahController::class
//         )->group(function () {
//             Route::get('mata-kuliah/', 'index');
//             Route::get('mata-kuliah/{mk}', 'show');
//             Route::post('mata-kuliah/', 'store');
//             Route::put('mata-kuliah/{mk}', 'update');
//             Route::delete('mata-kuliah/{mk}', 'destroy');
//         });

//         Route::controller(
//             App\Http\Controllers\Api\Admin\User\DosenController::class
//         )->group(function () {
//             Route::get('dosen/', 'index');
//             Route::get('dosen/{dosen}', 'show');
//             Route::post('dosen/', 'store');
//             Route::put('dosen/{dosen}', 'update');
//             Route::delete('dosen/{dosen}', 'destroy');
//         });

//         Route::controller(
//             App\Http\Controllers\Api\Admin\User\MahasiswaController::class
//         )->group(function () {
//             Route::get('mahasiswa/', 'index');
//             Route::get('mahasiswa/{mahasiswa}', 'show');
//             Route::post('mahasiswa/', 'store');
//             Route::put('mahasiswa/{mahasiswa}', 'update');
//             Route::delete('mahasiswa/{mahasiswa}', 'destroy');
//         });

//         Route::controller(
//             App\Http\Controllers\Api\Admin\User\AdminController::class
//         )->group(function () {
//             Route::get('/', 'index');
//             Route::get('/{admin}', 'show');
//             Route::post('/', 'store');
//             Route::put('/{admin}', 'update');
//             Route::delete('/{admin}', 'destroy');
//         });
//     });

//     Route::group([
//         'prefix' => 'dosen',
//         'as' => 'dosen.',
//         'middleware' => ['role:dosen']
//     ], function () {
//         Route::controller(
//             App\Http\Controllers\Api\Dosen\MahasiswaController::class
//         )->group(function () {
//             Route::get('mahasiswa', 'index');
//             Route::get('mahasiswa/{mahasiswa}', 'show');
//         });
//     });

//     Route::group([
//         'prefix' => 'mahasiswa',
//         'as' => 'mahasiswa.',
//         'middleware' => ['role:mahasiswa']
//     ], function () {
//         Route::controller(
//             App\Http\Controllers\Api\Mahasiswa\MataKuliahController::class
//         )->group(function() {
//             Route::get('prodi-matakuliah', 'available');
//             Route::post('enroll', 'enroll');
//         });
//     });
// });
