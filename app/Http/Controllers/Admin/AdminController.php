<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AdminContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $a;

    public function __construct(AdminContract $a)
    {
        $this->middleware('admin.redirect');
        $this->a = $a;
    }

    public function index()
    {
        $admins = $this->a->findByFilter();
        return view('admin.accounts.admins.index',compact('admins'));
    }

    public function create()
    {
        return view('admin.accounts.admins.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:admins,email',
            'password' => 'required|string|min:8|max:100|confirmed',
        ]);
        try {
            $this->a->add($data);
            session()->flash('success','Admin Account Has Been Created Successfully');
            return redirect()->route('admin.admins.index');
        }catch (\Exception $exception)
        {
            session()->flash('error','Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.admins.index');
        }

    }

//    public function show($id)
//    {
//        $a = $this->a->findOneById($id);
//        return view('admin.accounts.admins.show',compact('a'));
//    }

    public function edit($id)
    {
        $a = $this->a->findOneById($id);
        return view('admin.accounts.admins.edit',compact('a'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:admins,email,' . $id,
        ]);
        try {
            $this->a->update($id,$data);
            session()->flash('success', 'Admin Account Has Been Updated Successfully');
            return redirect()->route('admin.admins.index');
        } catch (\Exception $exception) {
            session()->flash('error', 'Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.admins.index');
        }
    }

    public function destroy($id)
    {
        try {
            $result = $this->a->delete($id);
            if ($result){
                session()->flash('success', 'Admin Account Has Been Deleted Successfully');
            }else{
                session()->flash('error', 'You can\'t delete this account');
            }
            return redirect()->route('admin.admins.index');
        } catch (\Exception $exception) {
            session()->flash('error', 'Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.admins.index');
        }
    }

}
