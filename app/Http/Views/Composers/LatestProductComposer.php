<?php


namespace App\Http\Views\Composers;


use App\Models\Product;

use Illuminate\View\View;

class LatestProductComposer
{
    public function compose(View $view): View
    {
            $latestProducts = cache()->remember('latestProductCache', 60 * 60 * 24 * 30, static function () {
                return Product::with(['categories'])->latest()->limit(20)->get();
            });
            return $view->with(['latestProducts'=>$latestProducts]);

    }
}
