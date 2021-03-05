<?php


namespace App\Http\Views\Composers;


use App\Models\Product;
use Illuminate\View\View;

class InspiredProductComposer
{
    public function compose(View $view): View
    {
            $inspiredProducts = cache()->remember('inspiredProductCache', 60 * 60 * 24 * 30, static function () {
                return Product::with(['categories', 'brand'])
                    ->where('is_active', '=', true)
                    ->where('inspired', '=', true)->get();
            });

        return $view->with(['inspiredProducts'=>$inspiredProducts]);
    }
}
