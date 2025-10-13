<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/careers', 'careers')->name('careers');
    Route::post('/careers/submit', 'careersSubmit')->name('careers-submit');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::middleware('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin/dashboard', 'dashboard')->name('admin-dashboard');
            Route::patch('/admin/{user}/set-admin', 'setAdmin')->name('set-admin');
            Route::patch('/admin/{user}/set-revisor', 'setRevisor')->name('set-revisor');
            Route::patch('/admin/{user}/set-writer', 'setWriter')->name('set-writer');
            Route::put('/admin/edit/category/{category}', 'editCategory')->name('edit-category');
            Route::delete('/admin/delete/category/{category}', 'deleteCategory')->name('delete-category');
            Route::post('/admin/category/store', 'storeCategory')->name('create-category');
            Route::put('/admin/edit/tag/{tag}', 'editTag')->name('edit-tag');
            Route::delete('/admin/delete/tag/{tag}', 'deleteTag')->name('delete-tag');
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
            Route::get('/create/article', 'create')->name('create-article');
            Route::post('/article/store', 'store')->name('article-store');
            Route::get('/article/edit/{article}', 'edit')->name('article-edit');
            Route::put('/article/update/{article}', 'update')->name('article-update');
            Route::delete('/article/delete/{article}', 'destroy')->name('article-delete');
        });
    });
    
    Route::middleware('writer')->group(function () {
        Route::controller(WriterController::class)->group(function () {
            Route::get('/writer/dashboard', 'dashboard')->name('writer-dashboard');
        });
    });
    
});


// Auth Google
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')
        ->scopes(['https://www.googleapis.com/auth/calendar'])
        ->stateless()
        ->redirect();
})->name('google-redirect');

Route::get('/auth/refresh', function () {
    $refreshToken = Storage::disk('local')->get('google/oauth-refresh-token.json');

    $newTokens = Socialite::driver('google')->refreshToken($refreshToken);

    if ($newTokens->token) {
        Storage::disk('local')->put('google/oauth-token.json', $newTokens->token);
    }

    if ($newTokens->refreshToken) {
        Storage::disk('local')->put('google/oauth-refresh-token.json', $newTokens->refreshToken);
    }

    return redirect('/gmail');
});

Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = App\Models\User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'password' => bcrypt(Str::random(8))
        ]
    );

    Auth::login($user);

    return redirect('/')->with('message', 'Accesso effettuato');
});


// Auth GitHub
Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github-redirect');

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();

    $user = App\Models\User::firstOrCreate(
        ['email' => $githubUser->getEmail()],
        [
            'name' => $githubUser->getName(),
            'password' => bcrypt(Str::random(8))
        ]
    );

    Auth::login($user);

    return redirect('/')->with('message', 'Accesso effettuato');
});

