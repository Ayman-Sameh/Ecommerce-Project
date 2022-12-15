<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\Page;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $page     = page::where('id' , $id)->firstOrFail(); 
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('front.page.show' , compact('page' , 'cartItem' , 'wishlist'));
    }
}
