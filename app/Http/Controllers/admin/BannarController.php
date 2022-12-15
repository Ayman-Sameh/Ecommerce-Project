<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bannar;
use Illuminate\Http\Request;

class BannarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannar = Bannar::all();
        return view('admin.bannar.index' , compact('bannar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bannar.create');
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
            'select' => 'required',
            'image'  => 'required|image|mimes:mimes:jpg,png,jpeg,gif.svg|max:4096',
        ]);

        $bannar = new Bannar ([
            'select' =>  $request->post('select'),
            'image'  =>  $request->post('image'),

            $img     = $request->file('image'),
            $newname = date('Y-m-d_') . $img->getClientOriginalName(),
            $img->move('storage/uploads/bannar' , $newname),
            
            'image' => $newname
        ]);

        $bannar->save();

        return redirect()->back()->with('success' , 'Added Bannar Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bannar $bannar)
    {
        return view('admin.bannar.edit' , compact('bannar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bannar $bannar)
    {
        $request->validate([
            'select' => 'required',
            'image'  => 'required|image|mimes:mimes:jpg,png,jpeg,gif.svg|max:4096',
        ]);

        $bannar->select = $request->select; 
       
        unlink(public_path('storage/uploads/bannar/' . $bannar->image) . $bannar->bannar);
        if($img = $request->file('image')){
            $newname = date('Y-m-d_') . $img->getClientOriginalName();
            $img->move('storage/uploads/bannar' , $newname);
            $bannar['image'] = $newname;
        }else{
            unset($bannar['image']);
        }

        $bannar->save();

        return redirect()->back()->with('success' , 'Bannar Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bannar $bannar)
    {
        unlink(public_path('storage/uploads/bannar/' . $bannar->image) . $bannar->bannar);
        $bannar->delete();

        return redirect()->back()->with('success' , 'Bannar Deleted Successfully');
    }
}
