<?php

namespace App\Http\Controllers\front;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('front.cart.checkout' , compact('cartItem' , 'wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function placeorder(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|min:2|max:40',
            'email'   => 'required|email',
            'phone'   => 'required|numeric',
            'address' => 'required|string',
            'note'    => 'string',

        ]);

        $order = new Order();
        $order->user_id     = Auth::id();
        $order->name        = $request->input('name');
        $order->offer       = $request->input('offer');
        $order->email       = $request->input('email');
        $order->phone       = $request->input('phone');
        $order->address     = $request->input('address');
        $order->notes       = $request->input('notes');
        $order->total_price = $request->input('total_price');
        $order->ordered_at  = Carbon::now();

        $order->save();

        $cartItem = Cart::where('user_id' , Auth::id())->get();
        foreach($cartItem as $item)
        {

            $orderproduct = OrderProduct::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'color_id'   => $item->product_color,
                'price'      => ((int)$item->product->price - (int)$item->product->offer),
                'qty'        => $item->product_qty,
            ]);
            $orderproduct->product()->attach($item->product_id);
            $orderproduct->order()->sync($order->id);
        }


        $cartItem = Cart::where('user_id' , Auth::id())->get();
        Cart::destroy($cartItem);

        return redirect('/')->with('success' , 'Ordered Successfully');
    }
}
