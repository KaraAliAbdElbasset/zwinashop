<?php

namespace App\Http\Controllers;

use App\Contracts\ProductContract;
use App\Helpers\Cart;
use App\Http\Resources\CitiesResources;
use App\Mail\AdminOrderMail;
use App\Mail\ClientOrderMail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{


    public function index()
    {
        return view("website.pages.cart");
    }

    public function store(ProductContract $productRepository,$id)
    {
        $data =$this->validate(\request(),[
            "qty" => "sometimes|nullable|numeric|gt:0",
            "attributes" => 'sometimes|nullable|array',
            "attributes.*" => 'required_with:attributes|integer|gt:0'
        ]);

        $product = $productRepository->findOneById($id);

        if (session()->has("cart"))
        {
            $cart = new Cart(session('cart'));
        }else
        {
            $cart = new Cart();
        }
        $cart->add($product,$data);
        session()->put("cart",$cart);
        session()->flash("success","Product has been added To Your Cart");
        session()->flash("product",$product);
        if (request()->has('buy'))
        {
            return redirect()->route('cart.index');
        }
        return redirect()->back();
    }


    public function update(Request $request)
    {
        $data = $this->validate($request,[
            "items" => "required|array",
            "items.*" => "required|numeric|gt:0",
        ],[
            'items.*.gt' => 'The product qty must be greater than 0.'
        ]);

        $cart = new Cart(session('cart'));
        $cart->update($data["items"]);

        session()->put("cart",$cart);
        session()->flash("success","Cart has been updated successfully");
        return redirect()->back();
    }

    public function removeItem($id)
    {
        if (session()->has("cart"))
        {
            try {
                $cart = new Cart(session("cart"));
                $cart->remove($id);
                if (count($cart->getItems())>0)
                {
                    session()->put("cart",$cart);
                }else{
                    session()->forget("cart");

                }

                session()->flash("success","Product Has Been Removed From Your Cart");
                return redirect()->back();
            }catch (\Exception $exception)
            {
                session()->flash("error","Oops! Something went wrong");
                return back();
            }


        }
        session()->flash("error","Aucun produit dans votre panier");
        return redirect()->back();
    }

    public function clearCart(){
        if (session()->has("cart")){
            session()->forget("cart");
            session()->flash("info","vous venez de vider votre panier");
        }else{
            session()->flash("info","Votre panier est déja vide");
        }
        return redirect()->route("shop");

    }

    public function checkout()
    {
        if (session()->has('cart'))
        {
            $cities = config('algeria-cities.wilayas');
            $cities_json = CitiesResources::collection($cities)->toJson();
            return view('website.pages.checkout',compact('cities','cities_json'));
        }
        return  redirect()->route('shop');
    }

  public function order(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'sometimes|nullable|email',
            'address' => 'required|string|max:200',
            'phone' => 'required|string|max:50',
            'wilaya' => 'required|string|max:50',
            'commune' => 'required|string|max:50',
        ]);

        try {
            $c = new Cart(session('cart'));

            $items = collect($c->getItems())->mapWithKeys(static function($i,$key){
//                DB::table('products')
//                    ->where('id', 1)->increment('popularity',1);
                return [
                    $i['product_id'] => [
                        'qty' => $i['qty'],
                        'price' => $i['price'],
                        'total' => $i['qty'] * $i['price'],
                        'attributes' => $i['attributes']
                    ]
                ];
            });
            $data['total_qty'] = $c->getTotalQty();
            $data['total_price'] = $c->getTotalPrice();
            $order = Order::create($data);

            $order->products()->attach($items->all());
//            mail to  admin
           // Mail::to(config('settings.default_email_address'))->send(new AdminOrderMail($order));
//            mail to client
            if ($order->email){
                Mail::to($order->email)->send(new ClientOrderMail($order));
            }

            session()->forget('cart');
            cache()->forget('NewestOrderCountCache');
            session()->flash('success','Order Has Been Created Successfully');
            return back();
        }catch (\Exception $exception)
        {   dd($exception);
            session()->flash('error','Oops! Something went wrong');
            return back();
        }
    }
}
