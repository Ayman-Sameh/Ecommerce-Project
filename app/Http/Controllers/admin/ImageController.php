<?php

namespace App\Http\Controllers\admin;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $image   = Image::all();
        return view('admin.images.index' , compact('image' , 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('admin.images.create' , compact('product'));
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
            'image'      => 'required',
            'image.*'    => 'image|mimes:jpg,png,jpeg,gif.svg|max:4096'
        ]);

        if($request->hasFile("image")){
            $files = $request->file("image");
            foreach($files as $file){
             $img =new Image([
                "product_id" =>$request->product_id,
                
                $imageName = date('Y-m-d_') . $file->getClientOriginalName(),
                $file->move(\public_path("/storage/uploads/Image-Product"),$imageName),
                'image' => $imageName,
                ]);
               $img->save();

            }
        }

        return redirect()->back()->with('success' , 'Added Product Successfully');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $product = Product::all();
        return view('admin.images.edit' , compact('image' , 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $request->validate([
            'product_id' => 'required',
            'image'      => 'image|mimes:jpg,png,jpeg,gif.svg|max:4096',
        ]);

        $image->product_id = $request->product_id; 

        unlink(public_path('storage/uploads/Image-Product/' . $image->image));
        if($img = $request->file('image')){
            $newname = date('Y-m-d_') . $img->getClientOriginalName();
            $img->move('storage/uploads/Image-Product' , $newname);
            $image['image'] = $newname;
        }else{
            unset($image['image']);
        }

        $image->save();

        return redirect()->back()->with('success' , 'Image Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        unlink(public_path('/storage/uploads/Image-Product/' . $image->image) );
        $image->delete();

        return redirect()->back()->with('success' , 'Image Deleted Successfully');
    }
}
