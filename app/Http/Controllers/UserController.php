<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Order;
use App\Shippingaddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user= User::find($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->phonenumber=$request->get('phonenumber');
        if($file = $request->file('photo')){
            $name = time().$file->getClientOriginalName();
            $file->move('images/users',$name);
             $user['photo'] = $name;
        }
        else{
            $user->photo="{{asset('avatar.jpg')}}";
        }
        $user->save();
        return redirect('/');
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userprofile(){
        $userID = Auth::user()->id; 
        $state_list = DB::table('addresses')
        ->groupBy('state')
        ->get();
        $myorders = Order::with('foods')->where('user_id',$userID)->get();
        $user = User::with('role')->where('id',$userID)->get();
        $shippingaddress = Shippingaddress::where('user_id',$userID)->paginate(3);
        return view('user.userprofile',compact('myorders','user','shippingaddress','state_list'));
    }
}
