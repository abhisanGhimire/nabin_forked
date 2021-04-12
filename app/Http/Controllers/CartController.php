<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function addToCart(Request $request , $id){
       

        if (Auth::check()) {
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
                    'quantity' => $data->quantity + 1,
                    'price' => $data->price + $food->price,
                ]);
            }else{

                $cart->quantity = 1;
                $cart->price = $food->price;
                $cart->save();
            }
            $request->session()->flash('success', 'Cart Added  successful!');
            return redirect()->route('cartlist');
        }
         
        else{
            return redirect('/login');
        }
    }


    static function cartItem(){

        $userID = Auth::user()->id;
     return Cart::where('user_id',$userID)->count();
    }

    function cartList(Request $request ){

        if (Auth::check()) {
            $userID = Auth::user()->id;
            $foods = DB::table('carts')
            ->join('foods' ,'carts.food_id','=','foods.id')
            ->where('carts.user_id',$userID)
            ->select('foods.*','carts.id as cart_id' ,'carts.quantity as cart_qty' ,'carts.price as cart_price')
            ->get();
            

                return view('cart.cartlist',compact('foods'));
            

        }
        else{
            return redirect('/login');
        }
    }

    function removeCart(Request $request ,$id){

        Cart::destroy($id);
        $request->session()->flash('success', 'Cart item removed  successful!');
        return redirect()->back();

    }
    public function updateCart(Request $request,$id) {
        //  return $request;
   
        $item = Cart::find($id);
        $food = Food::find($item->food_id);
        $item->quantity = $request->get('quantity');
        $item ->price = ($item->quantity)*($food->price);
        $item->save();
        $request->session()->flash('success', 'Cart quantity updated  successful!');
        return redirect()->back();
   }
   
}
