<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Massage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order    = Order::count();
        $user     = User::count();
        $categort = Category::count();
        $product  = Product::count();
        $massages = Massage::count();

        return view('admin.dashboard' , compact('order' , 'user' , 'categort' , 'product' , 'massages'));
    }
}
