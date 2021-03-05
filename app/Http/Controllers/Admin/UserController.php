<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Exception;

class UserController extends Controller
{
    protected $u;

    public function __construct(UserContract $u)
    {
        $this->middleware('admin.redirect');
        $this->u = $u;
    }

    public function index()
    {
        $users = $this->u->findByFilter();
        return view('admin.accounts.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.accounts.users.create');
    }

    public function store(UserRequest $request)
    {

        try {
            $this->u->add($request->validated());
            session()->flash('success','User Account Has Been Created Successfully');
            return redirect()->route('admin.users.index');
        }catch (Exception $exception)
        {
            session()->flash('error','Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.users.index');
        }

    }

    public function show($id)
    {
        $u = $this->u->findOneById($id);
        return view('admin.accounts.users.show',compact('u'));
    }

    public function edit($id)
    {
        $u = $this->u->findOneById($id);
        return view('admin.accounts.users.edit',compact('u'));
    }

    public function update($id,UserRequest $request)
    {

        try {
            $this->u->update($id,$request->validated());
            session()->flash('success', 'User Account Has Been Updated Successfully');
            return redirect()->route('admin.users.index');
        } catch (Exception $exception) {
            session()->flash('error', 'Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.users.index');
        }
    }

    public function destroy($id)
    {
        try {
            $this->u->delete($id);
            session()->flash('success', 'User Account Has Been Deleted Successfully');
            return redirect()->route('admin.users.index');
        } catch (Exception $exception) {
            session()->flash('error', 'Oops! Something Went Wrong, Please Try Again');
            return redirect()->route('admin.users.index');
        }
    }
}
