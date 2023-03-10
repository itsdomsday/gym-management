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

Route::get('/create', function () {
    return view('add-member');
});

Route::get('/create-trainer', function () {
    return view('add-trainer');
});

Route::get('/create-membership', function () {
    return view('add-membership');
});

Route::get('/', [App\Http\Controllers\MemberController::class, 'index'])->name('index');
Route::post('/store', [App\Http\Controllers\MemberController::class, 'store']);
Route::get('/edit/{id}', [App\Http\Controllers\MemberController::class, 'edit'])->name('edit');
Route::post('/update', [App\Http\Controllers\MemberController::class, 'update'])->name('update');
Route::get('/delete/{id}', [App\Http\Controllers\MemberController::class, 'delete'])->name('delete');

Route::get('/trainers', [App\Http\Controllers\TrainerController::class, 'trainers'])->name('trainers');
Route::post('/store_trainer', [App\Http\Controllers\TrainerController::class, 'store_trainer']);
Route::get('/edit_trainer/{id}', [App\Http\Controllers\TrainerController::class, 'edit_trainer'])->name('edit_trainer');
Route::post('/update_trainer', [App\Http\Controllers\TrainerController::class, 'update_trainer'])->name('update_trainer');
Route::get('/delete_trainer/{id}', [App\Http\Controllers\TrainerController::class, 'delete_trainer'])->name('delete_trainer');

Route::get('/memberships', [App\Http\Controllers\MembershipController::class, 'memberships'])->name('memberships');
Route::post('/store_membership', [App\Http\Controllers\MembershipController::class, 'store_membership']);
Route::get('/edit_membership/{id}', [App\Http\Controllers\MembershipController::class, 'edit_membership'])->name('edit_membership');
Route::post('/update_membership', [App\Http\Controllers\MembershipController::class, 'update_membership'])->name('update_membership');
Route::get('/delete_membership/{id}', [App\Http\Controllers\MembershipController::class, 'delete_membership'])->name('delete_membership');