<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Food;
use App\User;
use App\Order;
use App\Shippingaddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;


class OrderController extends Controller
{
    public function Orderedit(Request $request,$id)
    {
        $orders = Order::find($id);
       return view('order.edit',compact('orders'));
    }
    
    public function OrderUpdate(Request $request,$id){
        $orders = Order::find($id);
        $orders->status = $request->get('order_status');
        $orders->payment_status = $request->get('payment_status');
        $orders->save();
        return redirect('/admins');
    }

    function orderNow(Request $request){
        if (Auth::check()){
            $userID =Auth::user()->id;
                 $hhh =Shippingaddress::where('id',$request->shippAddr)->first();
               $shippingaddress = Shippingaddress::where('user_id',$userID)->where('is_home','=','1')->get();
                $abc = Shippingaddress::where('user_id',Auth::user()->id)->first();
                 $carts = DB::table('foods')
                ->join('carts', 'foods.id', '=', 'carts.food_id')
                 ->where('carts.user_id',$userID)
                 ->select('foods.price as fprice','foods.title as ftitle','carts.*')
                 ->get();
    
                 $total = DB::table('carts')
                    ->where('carts.user_id',$userID)
                    ->sum('carts.price');
            
                     return view('cart.ordernow',compact('carts','shippingaddress','total','hhh','abc'));       

             }
        
        else{
            return redirect('/login');
        }
        
    }

    function orderPlace(Request $request){
        // return $request;
       
                $hhh =Shippingaddress::where('id',$request->address)->first();
                $abc = Shippingaddress::where('user_id',Auth::user()->id)->first();
                $userID = Auth::user()->id;
                $shippingaddress = Shippingaddress::where('user_id',$userID)->where('is_home','=','1')->get();
                $allCart= Cart::where('user_id',$userID)->get();
                $phonenumber = User::where('id',$userID)->pluck('phonenumber');
                $order = new Order();
                $order->user_id=$userID;
                $order->status="pending";
                $order->payment_method="cash on delivery";
                $order->payment_status="pending";
                if($request->address){
                   
                    $order->address = ($hhh->state)  .'-'.($hhh->city) .'-' .($hhh->area) .'-'.($hhh->address1) .'-'.($hhh->address2);
                    
                }
                
                elseif($shippingaddress){

                    foreach($shippingaddress as $shipping){
                        $order->address = ($shipping->state)  .'-'.($shipping->city) .'-' .($shipping->area) .'-'.($shipping->address1) .'-'.($shipping->address2);
                    }
                }
                else{
                    $order->address = ($abc->state)  .'-'.($abc->city) .'-' .($abc->area) .'-'.($abc->address1) .'-'.($abc->address2);

                }
                $order->phonenumber=rtrim(ltrim($phonenumber,'["'),'"]');
                $order->price =$request->price;
                $order->cart=$allCart;
                $order->save();  
            foreach($allCart as $cart){
               
                $order->foods()->attach($cart->food_id,['quantity'=>$cart->quantity]);
            }
            Cart::where('user_id',$userID)->delete(); 
        return redirect()->route('thankyou');
    }

    function Myorder(){
        if (Auth::check()){
        $userID = Auth::user()->id; 
        $myorders = Order::with('foods')->where('user_id',$userID)->get();
        return view('frontend.myorder',compact('myorders'));
    }
        
    else{
        return redirect('/login');
    }
    }

    public function buyNow(Request $request,$id){
        if (Auth::check()){
        if($request->add_to_cart){

            
            $all_cart = Cart::where('user_id',Auth::user()->id)->get();
            $food = Food::find($id);
            
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->food_id = $request->food_id;
            $food_arr = [];
            foreach($all_cart as $data){
                $food_arr[] = $data->food_id; 
            }
  

            if(in_array($request->food_id,$food_arr)){

                Cart::where('id',$data->id)->update([
                    'quantity' => $data->quantity + $request->quantity,
                    'price' => $data->price +(($request->quantity)*($food->price)),
                ]);
            }
            
            
            else{
                // return $cart->quantity;

                $cart->quantity = $request->quantity  ;
                $cart->price = $food->price;
                $cart->save();
            }
            $request->session()->flash('success', 'Cart Added  successful!');
            return redirect()->route('cartlist');
        

        }

        else{
            $userID = Auth::user()->id;
            $hhh =Shippingaddress::where('id',$request->shippAddr)->first();
            $food= Food::find($id) ;
            $total= ((int)$request['quantity'] * (int)$food['price']);
            $quantity = $request->quantity;
            $shippingaddress = Shippingaddress::where('user_id',$userID)->where('is_home','=','1')->get();
            $abc = Shippingaddress::where('user_id',Auth::user()->id)->first();
            return view ('cart.buynow',compact('total','food','shippingaddress','hhh','abc','quantity'));
        }
    }
        
    else{
        return redirect('/login');
    }

    }

    function buyPlace(Request $request){
            $hhh =Shippingaddress::where('id',$request->address)->first();
            $userID = Auth::user()->id;
            $abc = Shippingaddress::where('user_id',Auth::user()->id)->first();
            $shippingaddress = Shippingaddress::where('user_id',$userID)->where('is_home','=','1')->get();
             $phonenumber = User::where('id',$userID)->pluck('phonenumber');
                $order = new Order();
                $order->user_id=$userID;
                $order->status="pending";
                $order->payment_method="cash on delivery";
                $order->payment_status="pending";
                if($request->address){
                   
                    $order->address = ($hhh->state)  .'-'.($hhh->city) .'-' .($hhh->area) .'-'.($hhh->address1) .'-'.($hhh->address2);
                    
                }
                
                elseif($shippingaddress){

                    foreach($shippingaddress as $shipping){
                        $order->address = ($shipping->state)  .'-'.($shipping->city) .'-' .($shipping->area) .'-'.($shipping->address1) .'-'.($shipping->address2);
                    }
                }
                else{
                    $order->address = ($abc->state)  .'-'.($abc->city) .'-' .($abc->area) .'-'.($abc->address1) .'-'.($abc->address2);

                }
                $order->phonenumber=rtrim(ltrim($phonenumber,'["'),'"]');
                $order->price =$request->price;
                $order->cart="no cart";
               $order->save();
               if($request->has('food_id')){

                  
                       $order->foods()->attach($request->food_id,['quantity'=>$request->quantity]);                                        
               }
               return redirect()->route('thankyou');
            }
    function inquiry(){
        return view('inquiry');
    }
    function postquote(Request $request){
        // return $request;
        $to_name = $request->name;
        $to_email = $request->email;
        $data = array('name'=>$request->name, "body" => "from saurav dai");
        Mail::send('emails', $data, function($message) use ($to_name, $to_email) {$message->to($to_email, $to_name)->subject('Order placed successfully');
        $message->from('kattelnabin69@gmail.com','Mero lunch');});

    }
    function  getquote(){
        return view('quotation');
    }
    function singlefood($id){
       $food = Food::find($id);
       return view('singlefood',compact('food'));
        
    }
    function singlefoodUpdate(Request $request,$id){
       
        $itemquantity = $request->quantity;
        $request->session()->flash('success', ' quantity updated  successful!');
        return redirect()->route('buynow',$id);

    }
}
