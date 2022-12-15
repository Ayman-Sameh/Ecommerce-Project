<?php

namespace App\Http\Controllers\admin;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::all();
        $search = $request['search'] ?? "";
        if($search != ""){
            $product = Product::where('name' , 'LIKE' , "%$search%")
                              ->orwhere('price' , 'LIKE' , "%$search%")
                              ->orwhere('category_id' , 'LIKE' , "%$search%")->paginate(15);
        }else {
            $product = Product::paginate(15);
        }
        return view('admin.products.index' , compact('product' , 'category' , 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.products.create' , compact('category'));
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
            'category_id' => 'required',
            'name'        => 'required|string|min:2|max:30',
            'price'       => 'required',
            'image'       => 'required|image|mimes:mimes:jpg,png,jpeg,gif.svg|max:4096',
            'description' => 'required',
        ]);

        $product = new Product([

            'category_id'  => $request->post('category_id'),
            'name'         => $request->post('name'),
            'price'        => $request->post('price'),
            'offer'        => $request->post('offer'),
            'description'  => $request->post('description'),
            '_token'       => $request->except('_token'),
   

            $img     = $request->file('image'),
            $newname = date('Y-m-d_') . $img->getClientOriginalName(),
            $img->move('storage/uploads/Products' , $newname),
            
            'image' => $newname
        ]);

        $product->save();

        return redirect()->back()->with('success' , 'Added Product Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('admin.products.edit' , compact('product' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required|string|min:2|max:30',
            'price'       => 'required',
            'image'       => 'image|mimes:mimes:jpg,png,jpeg,gif.svg|max:4096',
            'description' => 'required',
        ]);

        $product->category_id = $request->category_id; 
        $product->name        = $request->name; 
        $product->price       = $request->price; 
        $product->offer       = $request->offer; 
        $product->description = $request->description; 

        unlink(public_path('storage/uploads/Products/' . $product->image) . $product->product);
        if($img = $request->file('image')){
            $newname = date('Y-m-d_') . $img->getClientOriginalName();
            $img->move('storage/uploads/Products' , $newname);
            $product['image'] = $newname;
        }else{
            unset($product['image']);
        }

        $product->save();

        return redirect()->back()->with('success' , 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $images = Image::where("product_id" , $product->id)->get();
        foreach($images as $image){
            if (File::exists("storage/uploads/Image-Product/" . $image->image)){
                File::delete("storage/uploads/Image-Product/" . $image->image);
            }
            $product->image()->delete();
        }
        unlink(public_path('storage/uploads/Products/' . $product->image) . $product->product);
        $product->ProductColor()->delete();
        $product->delete();

        return redirect()->back()->with('success' , 'Product Deleted Successfully');
    }

    public function export() 
    {
        return Excel::download(new ProductExport, 'product.csv');
    }

    public function import() 
    {   
        return view('admin.products.import');
    }

    public function importproduct(Request $request) 
    {   
        $request->validate([
            'excel_file' => 'required',
        ]);
        Excel::import(new ProductImport, $request->file('excel_file')->store('temp'));
        
        
        return redirect()->back()->with('success', 'Product Imported Successfully');
    }
}
