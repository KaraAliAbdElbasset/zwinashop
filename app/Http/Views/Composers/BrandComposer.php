<?php


namespace App\Http\Views\Composers;


use App\Models\Brand;
use Illuminate\View\View;

class BrandComposer
{
    public function compose(View $view): View
    {
            $brands = cache()->remember('brandCache', 60 * 60 * 24 * 30, static function () {
                return Brand::orderBy('name','asc')->get();
            });

        return $view->with(['brands'=>$brands]);
    }
}
