<?php

use Illuminate\Support\Facades\Route;

Route::group([
   'prefix' => 'v1',
   'as' => 'api.v1.',
   'middleware' => ['auth:sanctum']
], function () {

   // ++++++++++++++++++++++ Fakultas
   Route::apiResource(
      'fakultas',
      App\Http\Controllers\Api\FakultasContoller::class,
      [
         'names' => [
            'index' => 'fakultas.list',
            'store' => 'fakultas.store',
            'show' => 'fakultas.show',
            'update' => 'fakultas.update',
            'destroy' => 'fakultas.destroy',
         ]
      ]
   );

   // ++++++++++++++++++++++ Jurusan
   Route::apiResource(
      'jurusan',
      App\Http\Controllers\Api\JurusanContoller::class,
      [
         'names' => [
            'index' => 'jurusan.list',
            'store' => 'jurusan.store',
            'show' => 'jurusan.show',
            'update' => 'jurusan.update',
            'destroy' => 'jurusan.destroy',
         ]
      ]
   );

   // ++++++++++++++++++++++ Jadwal
   Route::apiResource(
      'jadwal',
      App\Http\Controllers\Api\JadwalController::class
   );

   // ++++++++++++++++++++++ Program Studi
   Route::apiResource(
      'program-studi',
      App\Http\Controllers\Api\ProdiController::class,
      [
         'names' => [
            'index' => 'prodi.list',
            'store' => 'prodi.store',
            'show' => 'prodi.show',
            'update' => 'prodi.update',
            'destroy' => 'prodi.destroy',
         ]
      ]
   );

   // ++++++++++++++++++++++ Mata Kuliah
   Route::apiResource(
      'mata-kuliah',
      App\Http\Controllers\Api\MataKuliahController::class,
      [
         'names' => [
            'index' => 'matkul.list',
            'store' => 'matkul.store',
            'show' => 'matkul.show',
            'update' => 'matkul.update',
            'destroy' => 'matkul.destroy',
         ]
      ]
   );

   // ###################### USER ####################

   // ++++++++++++++++++++++ Admin
   Route::apiResource(
      'user/admin',
      App\Http\Controllers\Api\AdminController::class,
      [
         'names' => [
            'index' => 'admin.list',
            'store' => 'admin.store',
            'show' => 'admin.show',
            'update' => 'admin.update',
            'destroy' => 'admin.destroy',
         ]
      ]
   );

   // ++++++++++++++++++++++ Dosen
   Route::post('jadwal/add/dosen/{dosen}/jadwal/{jadwal}', [
      App\Http\Controllers\Api\JadwalDosenController::class,
      'create'
   ]);

   Route::delete('jadwal/remove/dosen/{dosen}/jadwal/{jadwal}', [
      App\Http\Controllers\Api\JadwalDosenController::class,
      'destroy'
   ]);

   Route::get('jadwal/dosen/{dosen}', [
      App\Http\Controllers\Api\JadwalDosenController::class,
      'index'
   ]);

   Route::apiResource(
      'user/dosen',
      App\Http\Controllers\Api\DosenController::class,
      [
         'names' => [
            'index' => 'dosen.list',
            'store' => 'dosen.store',
            'show' => 'dosen.show',
            'update' => 'dosen.update',
            'destroy' => 'dosen.destroy',
         ]
      ]
   );

   // ++++++++++++++++++++++ Mahasiswa
   Route::post('mahasiswa/{nim}/enroll', [
      App\Http\Controllers\Api\EnrollMatakuliahController::class,
      'create'
   ])->name('mahasiswa.enroll');

   Route::delete('mahasiswa/{nim}/enroll/{jadwal}', [
      App\Http\Controllers\Api\EnrollMatakuliahController::class,
      'remove'
   ])->name('mahasiswa.enroll.remove');

   Route::get('jadwal/mahasiswa/{nim}', [
      App\Http\Controllers\Api\JadwalMahasiswaController::class,
      'index'
   ]);

   Route::put('nilai/mahasiswa/{nim}/jadwal/{jadwal}', [
      App\Http\Controllers\Api\NilaiMahasiswaController::class,
      'update'
   ]);

   Route::apiResource(
      'user/mahasiswa',
      App\Http\Controllers\Api\MahasiswaController::class,
      [
         'names' => [
            'index' => 'mahasiswa.list',
            'store' => 'mahasiswa.store',
            'show' => 'mahasiswa.show',
            'update' => 'mahasiswa.update',
            'destroy' => 'mahasiswa.destroy',
         ]
      ]
   );
});
