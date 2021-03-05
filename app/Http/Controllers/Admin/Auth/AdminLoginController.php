<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if ($user = Auth::guard('admin')->attempt($data,true)){
            session()->flash('success','Welcome Back '.\auth('admin')->user()->name);
            return redirect()->route('admin.dashboard');
        }
        session()->flash('error',trans('auth.failed'));
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
