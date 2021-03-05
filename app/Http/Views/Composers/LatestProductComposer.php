<?php


namespace App\Http\Views\Composers;


use App\Models\Product;
use App\Models\Category;

use Illuminate\View\View;

class LatestProductComposer
{
    public function compose(View $view): View
    {
            $latestProducts = cache()->remember('latestProductCache', 60 * 60 * 24 * 30, static function () {
                return Category::with(['products'])->orderBy('created_at','desc')->get();
                   
            });
            return $view->with(['latestProducts'=>$latestProducts]);

    }
}
