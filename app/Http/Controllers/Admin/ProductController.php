<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $p;

    public function __construct(ProductContract $p)
    {
        $this->p = $p;
    }

    public function index()
    {
        $products = $this->p->findByFilter(10, ['categories', 'brand'],['latest']);
        return view('admin.products.index', compact('products'));
    }

    public function create(BrandContract $b,CategoryContract $c)
    {
        $categories = $c->all();
        $brands = $b->all();
        return view('admin.products.create',compact('categories','brands'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $this->p->add($request->validated());
            session()->flash('success', 'Product Has Been Created Successfully');
            cache()->forget('featuredProductCache');
            cache()->forget('inspiredProductCache');
            cache()->forget('latestProductCache');
            return redirect()->route('admin.products.show');
        } catch (\Exception $exception) {
            session()->flash('error', 'Oops! Something Went Wrong Please try again');
            return redirect()->route('admin.products.index');
        }
    }

    public function show($id)
    {
        $p = $this->p->findOneBy(['id' => $id], ['categories', 'images', 'brand']);
        return view('admin.products.show', compact('p'));
    }

    public function edit($id,CategoryContract $c,BrandContract $b)
    {
        $categories = $c->all();
        $brands = $b->all();
        $p = $this->p->findOneBy(['id' => $id], ['categories', 'images', 'brand']);
        return view('admin.products.edit', compact('p','categories','brands'));
    }

    public function update($id, ProductRequest $request)
    {
        try {
            $p = $this->p->update($id, $request->validated());
            session()->flash('success', 'Product Has Been Updated Successfully');
            cache()->forget('featuredProductCache');
            cache()->forget('inspiredProductCache');
            cache()->forget('latestProductCache');
            return redirect()->route('admin.products.show',$p->id);
        } catch (\Exception $exception) {
            session()->flash('error','Oops! Something Went Wrong Please try again');
            return redirect()->route('admin.products.index');
        }
    }

    public function destroy($id)
    {
        try {
            $this->p->delete($id);
            session()->flash('success', 'Product Has Been Deleted Successfully');
            cache()->forget('featuredProductCache');
            cache()->forget('inspiredProductCache');
            cache()->forget('latestProductCache');
            return redirect()->route('admin.products.show');
        } catch (\Exception $exception) {
            session()->flash('error', 'Oops! Something Went Wrong Please try again');
            return redirect()->route('admin.products.index');
        }
    }
}
