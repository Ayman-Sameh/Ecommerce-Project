<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addproduct(Request $request)
    {
        $request->validate([
            'product_color' => 'required'
        ]);
        $product_id    = $request->input('product_id');
        $product_qty   = $request->input('product_qty');
        $product_color = $request->input('product_color');

        if(Auth::check())
        {
            $prod_check = Product::where('id' , $product_id)->first();

            if($prod_check)
            {
                if(Cart::where('product_id' , $product_id)->where('user_id' , Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name . " Already Added to cart"]);
                }
                else
                {

                    $cartItem = new Cart();
    
                    $cartItem->user_id       = Auth::id();
                    $cartItem->product_id    = $product_id;
                    $cartItem->product_qty   = $product_qty;
                    $cartItem->product_color = $product_color;
    
                    $cartItem->save();
    
                    return response()->json(['status' => $prod_check->name . " Added to cart"]);
                }
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewcart()
    {
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();

        return view('front.cart.cart' , compact('cartItem' , 'wishlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deletecart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back()->with('done' , 'Product Deleted Successfully');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecart(Request $request)
    {
        $product_id  = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            if(Cart::where('product_id' , $product_id)->where('user_id' , Auth::id())->exists())
            {
                $cart = Cart::where('product_id' , $product_id)->where('user_id' , Auth::id())->first();
                $cart->product_qty = $product_qty;
                $cart->update();

                return response()->json(['status' => "Quantity Updated"]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cartcount()
    {
        $cartcount = Cart::where('user_id' , Auth::id())->count();

        return response()->json(['count' => $cartcount]);
    }
}
