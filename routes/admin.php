<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaskController;

Route::prefix('tasks')->name('task.')->group( function () {
  Route::get('/', [TaskController::class, 'index'])->name('index');
});
