<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;


Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');