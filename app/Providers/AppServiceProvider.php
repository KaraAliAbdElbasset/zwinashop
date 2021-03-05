<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('price', function ($money) {
            return "<?php echo number_format($money, 0); ?>";
        });
        Paginator::useBootstrap();
        View::composer(['admin.layouts.partials.sideBar'],\App\Http\Views\Composers\Admin\NewestOrderCount::class);

        View::composer(['website.partials.featuredProducts'],\App\Http\Views\Composers\FeaturedProductComposer::class);
        View::composer(['website.partials.inspiredProducts'],\App\Http\Views\Composers\InspiredProductComposer::class);
        View::composer(['website.partials.latestProducts'],\App\Http\Views\Composers\LatestProductComposer::class);
        View::composer(['website.pages.shop'],\App\Http\Views\Composers\CategoryComposer::class);


    }
}
