<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
            $user = User::where('name' , 'LIKE' , "%$search%")
                        ->orwhere('email' , 'LIKE' , "%$search%")->paginate(15);
        }else {
            $user = User::paginate(15);
        }

        return view('admin.users.index' , compact('user' , 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'type'     => 'required',
            'name'     => 'required|string|min:2|max:20',
            'email'    => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User([
            'type'     => $request->type,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return redirect()->back()->with('success' , 'Added User Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'type'     => 'required',
            'name'     => 'required|string|min:2|max:20',
            'email'    => 'required|email',
        ]);

        $user->type  = $request->type;
        $user->name  = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back()->with('success' , 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success' , 'User Deleted Successfully');
    }
}
