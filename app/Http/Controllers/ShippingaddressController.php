<?php

namespace App\Http\Controllers;

use App\Food;
use App\Shippingaddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShippingaddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state_list = DB::table('addresses')
       ->groupBy('state')
       ->get();
       return view('shippingaddress.index',compact('state_list'));
    
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
            // return $url=url()->previous();
           $shippingaddress=$request->all();
           Shippingaddress::create($shippingaddress);
           return redirect()->route('setaddress');
       
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
        $state_list = DB::table('addresses')
       ->groupBy('state')
       ->get();
       $shippingaddress = Shippingaddress::find($id);
       return view('shippingaddress.edit',compact('shippingaddress','state_list'));
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
        
        $shippingaddress = Shippingaddress::find($id);
        $shippingaddress->state = $request->get('state');
        $shippingaddress->city = $request->get('city');
        $shippingaddress->area = $request->get('area');
        $shippingaddress->address1 = $request->get('address1');
        $shippingaddress->address2 = $request->get('address2');
        $shippingaddress->user_id = $request->get('user_id');
        $shippingaddress->save();
        return redirect('/ordernow');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         Shippingaddress::destroy($id);
        $request->session()->flash('success', 'your address removed  successful!');
        return redirect()->back();

    }

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('addresses')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }

    public function is_home(Request $request){
        Shippingaddress::where('user_id',Auth::user()->id)->update([
            'is_home' => 0,
        ]);
       Shippingaddress::where('id',$request->address_id)->update([
        'is_home' => 1,
    ]);
       return redirect()->back();
    }
    function selectAddress(){
        $state_list = DB::table('addresses')
        ->groupBy('state')
        ->get();
        $userID =Auth::user()->id;
        $shippingaddress = Shippingaddress::where('user_id',$userID)->get();
        return view('cart.selectAddress',compact('shippingaddress','state_list'));
    }
    public function buyselect(Request $request){
        //  return $request;
       $foodID=  $request->food_id;
       $food = Food::find($foodID);
       $total= $request->total;
       $quantity = $request->quantity;
        $userID =Auth::user()->id;
        $shippingaddress = Shippingaddress::where('user_id',$userID)->get();
        return view('cart.buyselect',compact('shippingaddress','foodID','total','quantity'));
    }
    
}
