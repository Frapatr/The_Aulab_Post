<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;
use App\Models\User;

// Rotte pubbliche
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit')->middleware('auth');

// Rotte pubbliche per gli articoli
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search'); // NUOVA ROTTA

// Gruppo di rotte per il Redattore
Route::middleware('writer')->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
});

// Gruppo di rotte per l'Admin
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/user/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/user/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/user/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::put('/admin/category/{category}/edit', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/category/{category}/delete', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::put('/admin/tag/{tag}/edit', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/tag/{tag}/delete', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
});

// Gruppo di rotte per il Revisore
Route::middleware('revisor')->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('/revisor/article/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::post('/revisor/article/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::post('/revisor/article/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});