<?php


namespace App\Http\Views\Composers\Admin;


use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewestOrderCount
{
    public function compose(View $view)
    {
        $order_count = cache()->remember('NewestOrderCountCache',60*60,static function(){
                return DB::table('orders')->whereDay('created_at','=',now())
                                                ->where('state','=','pending')
                                                ->count();
        });
        return $view->with(compact('order_count'));
    }
}
