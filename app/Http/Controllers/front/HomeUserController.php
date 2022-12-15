<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Bannar;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(10);
        $product  = Product::all();
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        // Best Sellers Products
        $items = DB::table('order_products')->select('product_id' , DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->orderBy("count" , 'desc')->get();
        $product_ids = [];

        foreach($items as $item){
            array_push( $product_ids , $item->product_id);
        }

        $product_best = Product::whereIn('id' , $product_ids)->orderBy("id" , 'desc')->get();
        // End Best Sellers Products

        $bannar = Bannar::all();
        $brand  = Brand::all();
        
        return view('front.home.index' , compact('product' , 'category' , 'cartItem' , 'wishlist' , 'product_best' , 'bannar' , 'brand'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('front.page.show' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productlist()
    {
        $products = Product::select('name')->get();
        $data = [];

        foreach($products as $prod){
            $data[] = $prod['name'];
        }

        return $data;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchproduct(Request $request)
    {
        $search = $request->search; 

        if($search !="")
        {
            $product = Product::where('name' , 'LIKE' , '%' .$search. '%')->first();

            if($product)
            {
                return redirect('view-product/'. $product->id);
            }
            else{
                return redirect()->back()->with("status" , "No Product Matched your Search");
                // return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }

    }

    
}
