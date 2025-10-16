<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            View::share(['categories' => $categories]);
        };

        if (Schema::hasTable('tags')) {
            $tags = Tag::all();
            View::share((['tags' => $tags]));
        }

        View::composer('*', function ($view) {
            $pendingArticles = 0;
            $pendingRequestAdmin = 0;
            $pendingRequestRevisor = 0;
            $pendingRequestWriter = 0;

            if (auth()->check()) {
                if (auth()->user()->is_revisor) {
                    $pendingArticles = Article::where('is_accepted', null)->count();
                }

                if (auth()->user()->is_admin) {
                    $pendingRequestAdmin = User::where('is_admin', false)->whereNotNull('admin_request_at')->count();
                    $pendingRequestRevisor = User::where('is_revisor', false)->whereNotNull('revisor_request_at')->count();
                    $pendingRequestWriter = User::where('is_writer', false)->whereNotNull('writer_request_at')->count();
                }

                $view->with([
                    'pendingArticles' => $pendingArticles,
                    'pendingRequestAdmin' => $pendingRequestAdmin,
                    'pendingRequestRevisor' => $pendingRequestRevisor,
                    'pendingRequestWriter' => $pendingRequestWriter
                ]);
            }
        });
    }
}
