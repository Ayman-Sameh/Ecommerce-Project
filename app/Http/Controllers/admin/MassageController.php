<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Massage;
use Illuminate\Http\Request;

class MassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $massage = Massage::all();
        return view('admin.massages.index' , compact('massage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Massage $massage)
    {
        $massage->delete();

        return redirect()->back()->with('success' , 'massage Deleted Successfully');
    }
}
