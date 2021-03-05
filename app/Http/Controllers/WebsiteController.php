<?php

namespace App\Http\Controllers;

use App\Contracts\ProductContract;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        
        $categories =Category::whereNull('category_id')->get();
        $brand = Brand::all();
        $prod = Product::with('categories')->get();
        $catwp =Category::with('products')->get();
        return view('welcome',compact('brand','categories','prod','catwp'));
    }

    public function shop(ProductContract $product)
    {
        $categories =Category::with('children')->get();
        $products = $product->findByFilter(\request()->get('per_page')??18,['categories','brand'],['active','latest']);
        return view('website.pages.shop',compact('products','categories'));
    }

    public function product($id,ProductContract $product)
    {
        $categories =Category::with('children')->get();
        $p = $product->findOneBy(['id'=>$id],['categories','brand','images']);
        $images = $p->images->pluck('url')->prepend($p->image_url);
        $prodbrand = $p->brand->first();
        $product=Product::where('brand_id','=',$prodbrand->id)->get();
        return view('website.pages.product',compact('p','images','product','categories'));    }
}
