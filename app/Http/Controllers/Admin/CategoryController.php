<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Exception;

class CategoryController extends Controller
{
    protected $c;

    public function __construct(CategoryContract $c)
    {
        $this->c = $c;
    }

    public function index()
    {
        $categories = $this->c->findByFilter(10,['parent','children']);
        return view("admin.categories.index",compact('categories'));
    }

    public function create()
    {
        $categories = $this->c->findBy(['category_id' => null]);
        return view('admin.categories.create',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        try {
            $this->c->add($request->validated());
            cache()->forget('categoryCache');

            session()->flash('success','Category Has Been Created Successfully');
            return redirect()->route('admin.categories.index');
        }catch (Exception $exception)
        {
            session()->flash('error','Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.admins.index');
        }
    }

    public function show($id)
    {
        $c = $this->c->findOneBy(['id' => $id],['parent','children']);
        return view('admin.categories.show',compact('c'));
    }

    public function edit($id)
    {
        $c = $this->c->findById($id);
        $categories = $this->c->findBy(['category_id' => null],$id);
        return view('admin.categories.edit',compact('c','categories'));
    }

    public function update($id,CategoryRequest $request)
    {
        try {
            $this->c->update($id,$request->validated());
            cache()->forget('categoryCache');

            session()->flash('success','Category Has Been Updated Successfully');
            return redirect()->route('admin.categories.index');
        }catch (Exception $exception)
        {
            session()->flash('error','Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.admins.index');
        }
    }

    public function destroy($id)
    {
        try {
            $this->c->delete($id);
            session()->flash('success', 'Category Has Been Deleted Successfully');
            cache()->forget('featuredProductCache');
            cache()->forget('inspiredProductCache');
            cache()->forget('categoryCache');
            cache()->forget('latestProductCache');
            return redirect()->route('admin.categories.index');
        } catch (Exception $exception) {
            session()->flash('error', 'Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.admins.index');
        }

    }

}
