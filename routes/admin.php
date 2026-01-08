<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminFaqController;
use App\Http\Controllers\AdminGlassController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AdminContactController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', fn () => redirect()->route('admin.users.index'));
    
    Route::get('/admin/news', [NewsController::class, 'adminIndex'])->name('admin.news.index');
    Route::resource('/admin/news', NewsController::class)
        ->except(['index','show'])
        ->names('admin.news');
    
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

    Route::resource('/admin/glasses', AdminGlassController::class)
        ->except(['show'])
        ->names('admin.glasses');

    Route::resource('/admin/tags', AdminTagController::class)
        ->except(['show'])
        ->names('admin.tags');

    Route::get('/admin/appointments', [AdminAppointmentController::class, 'index'])->name('admin.appointments.index');
    Route::post('/admin/appointments/{appointment}/approve', [AdminAppointmentController::class, 'approve'])->name('admin.appointments.approve');
    Route::post('/admin/appointments/{appointment}/reject', [AdminAppointmentController::class, 'reject'])->name('admin.appointments.reject');
    Route::delete('/admin/appointments/{appointment}', [AdminAppointmentController::class, 'destroy'])->name('admin.appointments.destroy');

    // Contact Messages Admin
    Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/admin/contact/{message}', [AdminContactController::class, 'show'])->name('admin.contact.show');
    Route::post('/admin/contact/{message}/respond', [AdminContactController::class, 'respond'])->name('admin.contact.respond');
});
