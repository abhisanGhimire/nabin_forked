<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Food;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $categories = DB::table('foods')
    //     ->join('categories' ,'foods.cat_id','=','categories.id')
    //     ->select('foods.*','categories.*','foods.title as ftitle')
    //     ->get();

         $foods = Food::take(4)->get();
         $latestfoods = Food::take(4)->latest()->get();
         $categories = Category::all();
        //  return $foods;
    //    $categories= Category::with('foods')->get();
    //    return $categories;
        return view('frontend.index',compact('categories','foods','latestfoods'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function SingleCategory($id){
        //   return $id;
        $foods = Food::with('category')->where('cat_id',$id)->get();
        $categories = Category::get();
        return view('fmenusrontend.singlecategory',compact('foods','categories'));
    }
    public function menus(){
        $foods = Food::all();
        $categories = Category::get();
        return view('menu',compact('foods','categories'));
    }
    public function thankyou(){
        return view('thankyou');
    }

    
}
