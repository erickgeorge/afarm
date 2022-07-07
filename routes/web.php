<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/usajili', [App\Http\Controllers\HomeController::class, 'usajili'])->name('usajili');
Route::get('/usajili_approved', [App\Http\Controllers\HomeController::class, 'usajili_approved'])->name('usajili_approved');
Route::post('/approve_user/{id}', [App\Http\Controllers\HomeController::class, 'approve_user'])->name('approve_user');
Route::get('/mkulima', [App\Http\Controllers\HomeController::class, 'mkulima'])->name('mkulima');
Route::get('/mazao{id}', [App\Http\Controllers\HomeController::class, 'mazao'])->name('mazao');
Route::get('/taarifa', [App\Http\Controllers\HomeController::class, 'taarifa'])->name('taarifa');
Route::get('/myprofile{id}', [App\Http\Controllers\HomeController::class, 'myprofile'])->name('myprofile');
Route::post('/update_user/{id}', [App\Http\Controllers\HomeController::class, 'updateuser'])->name('update_user');
Route::post('/change_pass/{id}', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('changepass');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');