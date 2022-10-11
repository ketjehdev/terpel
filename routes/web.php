<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Main\WebController;
use Illuminate\Support\Facades\Route;

// authentication
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/loginHandle', [AuthController::class, 'login_handle']);
Route::post('/logoutHandle', [AuthController::class, 'logout_handle'])->name('logout');

// main routing
Route::middleware('auth')->group(function () {
    Route::prefix('terpel')->group(function () {
        Route::get('/home', [WebController::class, 'home'])->name('home');
        Route::get('/manage_users', [WebController::class, 'manage_users'])->name('manageUsers');
        Route::post('/addUser', [WebController::class, 'addUser'])->name('addUser');
        Route::post('/deleteUser/{id}', [WebController::class, 'deleteUser'])->name('deleteUser');
        Route::post('/editUser/{id}', [WebController::class, 'editUser'])->name('editUser');
        Route::get('/myProfil', [WebController::class, 'myProfil'])->name('myProfil');
        Route::post('/updateProfil', [WebController::class, 'updateProfil'])->name('updateProfil');
        Route::get('/v_changePassword', [WebController::class, 'changePassword'])->name('changePassword');
        Route::put('/update_password', [WebController::class, 'updatePassword'])->name('updatePassword');
    });
});
