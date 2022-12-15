<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit' , compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Setting $setting)
    {
        $request->validate([
            'name'        => 'required|string|min:2|max:25',
            'description' => 'required',
            'email'       => 'required|email',
            'logo'        => 'image|mimes:jpg,png,jpeg,gif.svg|max:4096',
            'phone'       => 'required',
            'whatsapp'    => 'required',
            'instagram'   => 'required',
            'facebook'    => 'required',
            'twitter'     => 'required',
            'youtube'     => 'required',
        ]);

        $setting->name        = $request->name; 
        $setting->description = $request->description; 
        $setting->email       = $request->email; 
        $setting->phone       = $request->phone; 
        $setting->whatsapp    = $request->whatsapp; 
        $setting->instagram   = $request->instagram; 
        $setting->facebook    = $request->facebook; 
        $setting->twitter     = $request->twitter; 
        $setting->youtube     = $request->youtube; 

        if($img = $request->file('logo')){
            unlink(public_path('storage/uploads/Settings/' . $setting->logo));
            $newname = date('Y-m-d_') . $img->getClientOriginalName();
            $img->move('storage/uploads/Settings' , $newname);
            $setting['logo'] = $newname;
        }else{
            unset($setting['logo']);
        }

        $setting->save();

        return redirect()->back()->with('success' , 'Settings Updated Successfully');
    }
}
