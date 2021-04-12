<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Food;
use App\Order;
use App\Category;
use App\Food_Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id==1) {
        $foods = Food::with('category')->get();
        return view('foods.index',compact('foods'));
    } else {
        return view("sorry");
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id==1) {

        $categories = Category::all();
        return view('foods.create',compact('categories'));
    } else {
        return view("sorry");
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role_id==1) {

        $validated = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'price' => 'required',
            'photo'=>'required',
            'cat_id'=>'required',
        ]);
        $foods =$request->all();
        if($file = $request->file('photo')){
            $name = time().$file->getClientOriginalName();
            $file->move('images/foods',$name);
             $foods['photo'] = $name;
        }
            //  return $foods;
             Food::create($foods);
             return redirect('/foods');
       
    } 
    else {
        return view("sorry");
       }
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
         $foods = Food::find($id);
         $categories = Category::all();
        // return $categories;
        return view('foods.edit',compact('foods','categories'));
       
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
        $validated = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'price' => 'required',
            'photo'=>'required',
            'cat_id'=>'required',
        ]);
        $foods = Food::find($id);
        $foods->title = $request->get('title');
        $foods->details = $request->get('details');
        $foods->price = $request->get('price');
        $foods->cat_id = $request->get('cat_id');
        if($file = $request->file('photo')){
            $name = time().$file->getClientOriginalName();
            $file->move('images/foods',$name);
             $foods['photo'] = $name;
        }
             $foods->save();
             return redirect('/foods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foods = Food::find($id);
        $foods->delete();
        return redirect('/foods');
    }
    
    public function Search(Request $request){
        // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $foods = Food::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('price', 'LIKE', "%{$search}%")
        ->get();

    // Return the search view with the resluts compacted
    return view('menu', compact('foods'));
}

    }
    

