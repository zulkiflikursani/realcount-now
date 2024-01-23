<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\CalonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyContorller;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\RegisterUserCompany;
use App\Http\Controllers\SetuserController;
use App\Models\Jumlahsuara;

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
    return view('welcome');
});

Route::get('/company', [CompanyContorller::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyContorller::class, 'create'])->name('company.create');
Route::post('/company', [CompanyContorller::class, 'insert'])->name('company.insert');
Route::get('/company/{company}/edit', [CompanyContorller::class, 'edit'])->name('company.edit');
Route::put('/company/{company}/update', [CompanyContorller::class, 'update'])->name('company.update');
Route::delete('/company/{company}/delete', [CompanyContorller::class, 'delete'])->name('company.delete');

Route::get('/register-company', [RegisterUserCompany::class, 'index'])->name('register.index');
Route::post('/register-company/insert', [RegisterUserCompany::class, 'create'])->name('register.insert');
Route::get('/list-user', [RegisterUserCompany::class, 'listuser'])->name('register.listuser');
Route::delete('/register/{users}/delete', [RegisterUserCompany::class, 'delete'])->name('register.delete');


Route::get('/calon', [CalonController::class, 'index'])->name('calon.index');
Route::get('/calon/create', [CalonController::class, 'create'])->name('calon.create');
Route::post('/calon/insert', [CalonController::class, 'store'])->name('calon.insert');
Route::get('/calon/{calon}/edit', [CalonController::class, 'edit'])->name('calon.edit');
Route::put('/calon/{calon}/edit', [CalonController::class, 'update'])->name('calon.update');
Route::delete('/calon/{calon}/delete', [CalonController::class, 'delete'])->name('calon.delete');

Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
Route::get('/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
Route::post('/lokasi/insert', [LokasiController::class, 'insert'])->name('lokasi.insert');
Route::get('/lokasi/{lokasi}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
Route::put('/lokasi/{lokasi}/update', [LokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/{lokasi}/delete', [LokasiController::class, 'delete'])->name('lokasi.delete');


Route::get('/setuser', [SetuserController::class, 'index'])->name('setuser.index');
Route::get('/setuser/create', [SetuserController::class, 'create'])->name('setuser.create');
Route::post('/setuser/insert', [SetuserController::class, 'insert'])->name('setuser.insert');
Route::get('/setuser/{id}/edit', [SetuserController::class, 'edit'])->name('setuser.edit');
Route::put('/setuser/{setuser}/update', [SetuserController::class, 'update'])->name('setuser.update');
Route::delete('/setuser/{id}/delete', [SetuserController::class, 'delete'])->name('setuser.delete');

Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');


Route::post('/suara/insert', [AnggotaController::class, "insert"])->name('suara.insert');
Route::delete('/suara/{id}/delete', [AnggotaController::class, "delete"])->name('suara.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
