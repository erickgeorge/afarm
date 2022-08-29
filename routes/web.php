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

Route::get('/forget_password', function () {
    return view('forgotpassword');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/usajili', [App\Http\Controllers\HomeController::class, 'usajili'])->name('usajili');
Route::get('/usajili_approved', [App\Http\Controllers\HomeController::class, 'usajili_approved'])->name('usajili_approved');
Route::post('/approve_user/{id}', [App\Http\Controllers\HomeController::class, 'approve_user'])->name('approve_user');
Route::get('/mkulima', [App\Http\Controllers\HomeController::class, 'mkulima'])->name('mkulima');
Route::get('/mazao{id}', [App\Http\Controllers\HomeController::class, 'mazao'])->name('mazao');
Route::get('/taarifa', [App\Http\Controllers\HomeController::class, 'taarifa'])->name('taarifa');
Route::get('/manunuzi', [App\Http\Controllers\HomeController::class, 'manunuzi'])->name('manunuzi');
Route::get('/myprofile{id}', [App\Http\Controllers\HomeController::class, 'myprofile'])->name('myprofile');
Route::post('/update_user/{id}', [App\Http\Controllers\HomeController::class, 'updateuser'])->name('update_user');
Route::post('/change_pass/{id}', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('changepass');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/view_user{id}', [App\Http\Controllers\HomeController::class, 'viewuser'])->name('view_user');

Route::get('/view__mkulima/{id}', [App\Http\Controllers\HomeController::class, 'viewusermkulima'])->name('view_user_mkulima');

Route::get('/add_user', [App\Http\Controllers\HomeController::class, 'add_user'])->name('add_user');
Route::post('/new_user', [App\Http\Controllers\HomeController::class, 'newuser'])->name('newuser');
Route::post('/delete_user/{id}', [App\Http\Controllers\HomeController::class, 'deleteuser'])->name('deleteuser');
Route::post('/forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'postEmail'])->name('postEmail');
Route::get('/reset_password{token}', [App\Http\Controllers\ResetPasswordController::class, 'getPassword'])->name('getPass');
Route::post('/reset-password', [App\Http\Controllers\ResetPasswordController::class, 'updatePassword'])->name('updatePa');
Route::get('/pass_myprofile{id}', [App\Http\Controllers\HomeController::class, 'passmyprofile'])->name('pass_myprofile');
Route::get('/view_taarifa{id}', [App\Http\Controllers\HomeController::class, 'viewtaarifa'])->name('view_taarifa');
Route::get('/view_manunuzi{id}', [App\Http\Controllers\HomeController::class, 'viewmanunuzi'])->name('view_manunuzi');
Route::get('/view_mkulima{id}', [App\Http\Controllers\HomeController::class, 'viewmanunuzimkulima'])->name('view_manunuzi_mkulima');
Route::get('/view_next_mkulima{id}', [App\Http\Controllers\HomeController::class, 'viewmanunuzimkulimanext'])->name('view_manunuzi_next');
Route::post('/delete_usajiri/{id}', [App\Http\Controllers\HomeController::class, 'deleteuserusajiri'])->name('deleteusajiri');

Route::post('/edit_mkulimaok/{id}', [App\Http\Controllers\HomeController::class, 'editmkulimaok'])->name('edit_mkulima');