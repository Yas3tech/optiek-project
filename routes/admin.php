<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminUserController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', fn () => redirect()->route('admin.users.index'));
    
    Route::resource('/admin/news', NewsController::class)
        ->except(['index','show']);
    
    Route::resource('/admin/users', AdminUserController::class)
        ->except(['show', 'edit', 'update'])
        ->names('admin.users');
    Route::post('/admin/users/{user}/toggle-admin', [AdminUserController::class, 'toggleAdmin'])
        ->name('admin.users.toggle-admin');
});
