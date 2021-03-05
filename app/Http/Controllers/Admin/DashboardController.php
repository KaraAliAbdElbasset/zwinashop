<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //category count
        $c_count = DB::table('categories')->count();
        //brand count
        $b_count = DB::table('brands')->count();
        //brand count
        $p_count = DB::table('products')->count();

        $o_pending = DB::table('orders')->where('state','pending')->count();
        $o_validated = DB::table('orders')->where('state','validated')->count();
        $o_canceled = DB::table('orders')->where('state','canceled')->count();

        return view('admin.dashboard',compact('c_count','b_count','p_count','o_canceled','o_validated','o_pending'));
    }

    public function artisan(): string
    {
        Artisan::call('cache:clear');
       // Artisan::call('storage:link');
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');

        return 'done';
    }
}
