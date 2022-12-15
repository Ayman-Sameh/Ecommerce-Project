<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index' , compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
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
            'image'  => 'required|image|mimes:mimes:jpg,png,jpeg,gif.svg|max:4096',
        ]);

        $brand = new Brand ([
            'image'  =>  $request->post('image'),

            $img     = $request->file('image'),
            $newname = date('Y-m-d_') . $img->getClientOriginalName(),
            $img->move('storage/uploads/brand' , $newname),
            
            'image' => $newname
        ]);

        $brand->save();

        return redirect()->back()->with('success' , 'Added Brand Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit' , compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        // dd($request->all());
        $request->validate([
            'image'  => 'required|image|mimes:mimes:jpg,png,jpeg,gif.svg|max:4096',
        ]);

       
        unlink(public_path('storage/uploads/brand/' . $brand->image) . $brand->brands);
        if($img = $request->file('image')){
            $newname = date('Y-m-d_') . $img->getClientOriginalName();
            $img->move('storage/uploads/brand' , $newname);
            $brand['image'] = $newname;
        }else{
            unset($brand['image']);
        }

        $brand->save();

        return redirect()->back()->with('success' , 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        unlink(public_path('storage/uploads/brand/' . $brand->image) . $brand->brand);  
        $brand->delete();

        return redirect()->back()->with('success' , 'Brand Deleted Successfully');
    }
}
