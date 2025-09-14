<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/careers', 'careers')->name('careers');
    Route::post('/careers/submit', 'careersSubmit')->name('careers-submit');
});

Route::middleware('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboard')->name('admin-dashboard');
        Route::patch('/admin/{user}/set-admin', 'setAdmin')->name('set-admin');
        Route::patch('/admin/{user}/set-revisor', 'setRevisor')->name('set-revisor');
        Route::patch('/admin/{user}/set-writer', 'setWriter')->name('set-writer');
    });
});

Route::middleware('revisor')->group(function () {
    Route::controller(RevisorController::class)->group(function () {
        Route::get('/revisor/dashboard', 'dashboard')->name('revisor-dashboard');
        Route::post('/revisor/{article}/accept', 'articleAccept')->name('revisor-article-accept');
        Route::post('/revisor/{article}/reject', 'articleReject')->name('revisor-article-reject');
        Route::post('/revisor/{article}/undo', 'articleUndo')->name('revisor-article-undo');
    });
});

Route::controller(ArticleController::class)->group(function () {
    Route::get('/article/index', 'index')->name('article-index');
    Route::get('article/search', 'articleSearch')->name('article-search');
    Route::get('article/show/{article}', 'show')->name('article-show');
    Route::get('/article/category/{category}', 'byCategory')->name('article-category');
    Route::get('article/redactor/{user}', 'byUser')->name('article-redactor');
});

Route::middleware('writer')->group(function () {
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/writer/dashboard', 'dashboard')->name('writer-dashboard');
        Route::get('/create/article', 'create')->name('create-article');
        Route::post('/article/store', 'store')->name('article-store');
    });
});
