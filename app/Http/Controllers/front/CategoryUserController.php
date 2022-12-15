<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $products = Product::query();
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();

        if($request->filter)
        {
            $products->whereIN('category_id' , $request->filter);
        }
        if($request->min_price)
        {
            $products->where('price' , '>=' , $request->min_price);
        }
        if($request->max_price)
        {
            $products->where('price' , '<=' , $request->max_price);
        }

        $product = $products->paginate(9)->withQueryString();

        return view('front.product.index',compact('product', 'cartItem' , 'wishlist'));
    }

}
