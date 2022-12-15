<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $user = User::all();
        return view('admin.report.reportorder' , compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportorder(Request $request)
    {
        $orders = Order::query();
        $user = User::all();

        if ($request->status == "0") {
            $orders;
        }
        if ($request->status == "accepted")
        {
            $orders->where('status',$request->status);
        } 
        if ($request->status == "shipping now")
        {
            $orders->where('status',$request->status);
        } 
        if ($request->status == "done shipping")
        {
            $orders->where('status',$request->status);
        } 
        if ($request->status == "rejected")
        {
            $orders->where('status',$request->status);
        } 
        if($request->start)
        {
            $orders->where('ordered_at' , '>=' , $request->start);
        }
        if($request->end)
        {
            $orders->where('ordered_at' , '<=' , $request->end);
        }
        if($request->min)
        {
            $orders->where('total_price' , '>=' , $request->min);
        }
        if($request->max)
        {
            $orders->where('total_price' , '<=' , $request->max);
        }
        if($request->user)
        {
            $orders->where('user_id' , $request->user);
        }

        $order = $orders->get();

        return view('admin.report.reportorder',compact('order' , 'user'));
    }
}
