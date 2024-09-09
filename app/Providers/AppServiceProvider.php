<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Models\Backend\FrontendSeo;
use App\Models\Backend\PostNews;
use App\Models\Backend\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app['request']->server->set('HTTP', true);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {
        view()->composer('frontend.includes.seo', function ($view) use ($request) {
            $slug = $request->route('slug'); // Retrieve the slug from the route
            // $cat_slug = $request->route('category_slug');
            $seo = FrontendSeo::where('id', 1)->first();
            $details_news = PostNews::where('slug', $slug)->first(); 
            $seo_cat = Category::where('category_slug', $slug)->first(); 
            $view->with([
                'seo' => $seo,
                'details_news' => $details_news,
                'seo_cat' => $seo_cat
            ]);
        });
    }
}
