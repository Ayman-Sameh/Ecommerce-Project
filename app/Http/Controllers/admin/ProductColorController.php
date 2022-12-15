<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $productcolor = ProductColor::where('name' , 'LIKE' , "%$search%")->paginate(15);
        }else {
            $productcolor = ProductColor::paginate(15);
        }
        // $productcolor = ProductColor::all();
        $product      = Product::all();
        return view('admin.product-color.index' , compact('productcolor' , 'product' , 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('admin.product-color.create' , compact('product'));
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
            'product_id' => 'required',
            'name'       => 'required|string|min:2|max:30',
            'color'      => 'required',
        ]);

        ProductColor::create($request->except('_token'));

        return redirect()->back()->with('success' , 'Added Color Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductColor $productcolor)
    {
        $product = Product::all();
        return view('admin.product-color.edit' , compact('productcolor' , 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductColor $productcolor)
    {
        $request->validate([
            'product_id' => 'required',
            'name'       => 'required|string|min:2|max:30',
            'color'      => 'required',
        ]);

        $productcolor->product_id = $request->product_id ;
        $productcolor->name       = $request->name ;
        $productcolor->color      = $request->color ;

        $productcolor->save();

        return redirect()->back()->with('success' , 'Color Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductColor $productcolor)
    {
        $productcolor->delete();

        return redirect()->back()->with('success' , 'Color Deleted Successfully');
    }
}
