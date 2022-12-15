<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('user_id' , Auth::id())->get();
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('front.account.index' , compact('cartItem' , 'wishlist' , 'order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changepassword()
    {
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('front.account.change-password' , compact('cartItem' , 'wishlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error" , "Old Password Doesn't Match");
        }
        
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success" , "Password Changed SuccessFully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprofile()
    {
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('front.account.edit-profile' , compact('cartItem' , 'wishlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:mimes:jpg,png,jpeg,gif.svg|max:4096',
            'name'  => 'required',
            'email' => 'required',
        ]);

        $img = $request->image;
        $newname = date('Y-m-d_') . $img->getClientOriginalName();
        $img->move('storage/uploads/user' , $newname);
        

        User::whereId(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $newname,
        ]);

        return back()->with("success" , "Profile Changed SuccessFully");
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vieworder($id)
    {
        $order = Order::findOrFail($id);
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();

        return view('front.account.show' , compact('order' , 'cartItem' , 'wishlist'));
    }
}
