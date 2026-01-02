<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminFaqController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', fn () => redirect()->route('admin.users.index'));
    
    Route::resource('/admin/news', NewsController::class)
        ->except(['index','show']);
    
    Route::resource('/admin/users', AdminUserController::class)
        ->except(['show', 'edit', 'update'])
        ->names('admin.users');
    Route::post('/admin/users/{user}/toggle-admin', [AdminUserController::class, 'toggleAdmin'])
        ->name('admin.users.toggle-admin');

    // FAQ Admin
    Route::get('/admin/faq', [AdminFaqController::class, 'index'])->name('admin.faq.index');
    Route::get('/admin/faq/category/create', [AdminFaqController::class, 'createCategory'])->name('admin.faq.create-category');
    Route::post('/admin/faq/category', [AdminFaqController::class, 'storeCategory'])->name('admin.faq.store-category');
    Route::get('/admin/faq/category/{category}/edit', [AdminFaqController::class, 'editCategory'])->name('admin.faq.edit-category');
    Route::put('/admin/faq/category/{category}', [AdminFaqController::class, 'updateCategory'])->name('admin.faq.update-category');
    Route::delete('/admin/faq/category/{category}', [AdminFaqController::class, 'destroyCategory'])->name('admin.faq.destroy-category');
    Route::get('/admin/faq/question/create', [AdminFaqController::class, 'createFaq'])->name('admin.faq.create-faq');
    Route::post('/admin/faq/question', [AdminFaqController::class, 'storeFaq'])->name('admin.faq.store-faq');
    Route::get('/admin/faq/question/{faq}/edit', [AdminFaqController::class, 'editFaq'])->name('admin.faq.edit-faq');
    Route::put('/admin/faq/question/{faq}', [AdminFaqController::class, 'updateFaq'])->name('admin.faq.update-faq');
    Route::delete('/admin/faq/question/{faq}', [AdminFaqController::class, 'destroyFaq'])->name('admin.faq.destroy-faq');
});
