<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\Massage;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartItem  = Cart::all();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('front.contact.index' , compact( 'cartItem', 'wishlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|min:2|max:30',
            'email'        => 'required|email',
            'subject'        => 'required|string|min:2|max:50',
            'massage'        => 'required',
        ]);

        Massage::create($request->except('_token'));

        return redirect()->back()->with('success' , 'Massage Added Successfully');
    }

}
