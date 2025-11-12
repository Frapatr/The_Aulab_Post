<?php
namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
    publicT function boot(): void
    {
        // Questo codice è stato commentato per permettere
        // il deploy su server come Railway/Render,
        // che eseguono comandi prima che il database sia pronto.
        //
        // if (Schema::hasTable('categories')) {
        //     $categories = Category::all();
        //     View::share('categories', $categories);
        // }
        //
        // if (Schema::hasTable('tags')) {
        //     $tags = Tag::all();
        //     View::share('tags', $tags);
        // }
    }
}