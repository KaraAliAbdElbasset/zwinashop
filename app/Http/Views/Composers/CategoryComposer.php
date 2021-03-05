<?php


namespace App\Http\Views\Composers;


use App\Models\Brand;
use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view): View
    {
            $categories = cache()->remember('categoryCache', 60 * 60 * 24 * 30, static function () {
                return Category::with('children')->whereNull('category_id')->orderBy('name','asc')->get();
            });

        return $view->with(['categories'=>$categories]);
    }
}
