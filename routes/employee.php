<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\TaskController;

Route::prefix('tasks')->name('task.')->group(function (){

    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('create', [TaskController::class, 'create'])->name('create');
    Route::post('store', [TaskController::class, 'store'])->name('store');

    Route::prefix('{task}')->middleware('isOwnerTask')->group(function (){
        Route::get('/', [TaskController::class, 'edit'])->name('edit');
        Route::put('/', [TaskController::class, 'update'])->name('update');
        Route::delete('/', [TaskController::class, 'destroy'])->name('destroy');
    });
});
