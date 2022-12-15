<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product  = Product::paginate(9);
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('front.product.index', compact('product' , 'cartItem' , 'wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $product       = Product::find($id);
        $cartItem      = Cart::where('user_id' , Auth::id())->get();
        $wishlist      = Wishlist::where('user_id' , Auth::id())->get();
        $imgproduct    = Image::where('product_id' , $product->id)->get();
        $colorproduct  = ProductColor::where('product_id' , $product->id)->get();

        return view('front.product.view' , compact('product' , 'imgproduct' , 'colorproduct' , 'cartItem' , 'wishlist'));

    }
}