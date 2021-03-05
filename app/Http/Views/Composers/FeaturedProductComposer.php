<?php


namespace App\Http\Views\Composers;


use App\Models\Product;
use Illuminate\View\View;

class FeaturedProductComposer
{
    public function compose(View $view): View
    {
            $featuredProducts = cache()->remember('featuredProductCache', 60 * 60 * 24 * 30, static function () {
                return Product::with(['categories', 'brand'])
                    ->where('is_active', '=', true)
                    ->where('featured', '=', true)->get();
            });

        return $view->with(['featuredProducts'=>$featuredProducts]);
    }
}
