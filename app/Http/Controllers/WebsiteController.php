<?php

namespace App\Http\Controllers;

use App\Contracts\ProductContract;
use App\Models\AttributeValue;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {

        $categories =Category::whereNull('category_id')->get();
        $prod = Product::with('categories')->get();
        $catwp =Category::with('products')->get();
        $images = Carousel::orderBy('created_at','desc')->where('state',true)->get();
        return view('welcome',compact('categories','prod','catwp','images'));
    }

    public function shop(ProductContract $product)
    {
        $categories = Category::latest()->get();
        $attributes = AttributeValue::with('attribute')->get();
        $products = $product->findByFilter(\request()->get('per_page')??16,['categories'],['active','latest']);
        return view('website.pages.shop',compact('products','categories','attributes'));
    }

    public function product($id,ProductContract $product)
    {
        $p = $product->findOneBy(['id'=>$id],['categories','attributes']);
        $attributes = $p->attributes->pluck('image_url','value')->toArray();
        $images = [
           [
               'image' => $p->image_url,
               'attribute' => 'default'
           ]
        ];
        foreach ($attributes as $key => $a)
        {
            if ($a){
                $images[] = ['image' => $a , 'attribute' => $key];
            }
        }
        if (\request()->ajax())
        {
            $data = [
                'images' => $images,
                'p' => $p,
            ];
            return response()->json($data);
        }

        $attributes = $p->attributes->groupBy('attribute');

        return view('website.pages.product',compact('p','images','attributes'));
    }

    public function about()
    {
        return view('website.pages.about');
    }

    public function switchLang($lang)
    {
        session()->put('locale',$lang);
        return redirect()->back();

    }
}
