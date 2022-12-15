<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
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
        return view('front.wishlist.index', compact('cartItem' , 'wishlist' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            
            if(Product::find($product_id))
            {
                $wishlist = new Wishlist();
                $wishlist->product_id = $product_id;
                $wishlist->user_id    = Auth::id();
                $wishlist->save();

                return response()->json(['status' => "Product Added To Wishlist"]);
            }
            else
            {
                return response()->json(['status' => "Product Does Not Exist"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login To Continue"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deletecart($id)
    {
        $wishlist = Wishlist::find($id);

        $wishlist->delete();

        return redirect()->back()->with('done' , 'Product Deleted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wishlistcount()
    {
        $wishlistcount = Wishlist::where('user_id' , Auth::id())->count();

        return response()->json(['count' => $wishlistcount]);
    }
}
