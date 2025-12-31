<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', fn () => 'ADMIN PAGE');
    Route::resource('/admin/news', NewsController::class)
        ->except(['index','show']);
});
