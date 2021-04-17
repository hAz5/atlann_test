<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaskController;

Route::prefix('tasks')->name('task.')->group( function () {
  Route::get('/', [TaskController::class, 'index'])->name('index');
});
Route::prefix('users')->name('user.')->group( function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
});
