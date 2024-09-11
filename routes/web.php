<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/detail-page/{page}', [FrontendController::class, 'detailpage']);

Route::get('login', function () {
    return redirect ('admin');
})->name('login');
