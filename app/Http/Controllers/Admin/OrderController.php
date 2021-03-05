<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $o;

    public function __construct(OrderContract $o)
    {
        $this->o = $o;
    }

    public function index()
    {
        $orders = $this->o->findByFilter(\request()->get('per_page')??10);
        return view('admin.orders.index',compact('orders'));
    }

    public function show($id)
    {
        $o = $this->o->findOneBy(['id' => $id],['products']);
        return view('admin.orders.show',compact('o'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'state' => 'required|string|in:canceled,validated'
        ]);
        try {
            $this->o->update($id,$data);
            cache()->forget('NewestOrderCountCache');
            session()->flash('success','Order Has Been Updated Successfully');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            session()->flash('error','Oops! Something Went Wrong please try again');
            return redirect()->back();
        }

    }

    public function destroy($id)
    {

        try {
            $this->o->delete($id);
            cache()->forget('NewestOrderCountCache');
            session()->flash('success','Order Has Been Deleted Successfully');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            session()->flash('error','Oops! Something Went Wrong please try again');
            return redirect()->back();
        }
    }
}
