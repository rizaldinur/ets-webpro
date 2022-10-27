<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // $categories=DB::table('categories')->get();
        $categories = Category::all();
        $foods = Food::all();
        // $foods = DB::table('foods')->get();
        return view('foods',['user' => $user,'categories' =>$categories,'foods' =>$foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        // $categories=DB::table('categories')->get();
        $categories = Category::all();
        return view('add-foods',['user' => $user,'categories' =>$categories]);
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category'=>'required',
            'featured' => 'required',
            'active' => 'required',
        ]);

        Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'categoryid' => $request->category,
            'featured' => $request->featured,
            'active' => $request->active,
            
        ]);

        return redirect('add-categories')->with('status', 'Data Sukses Ditambah');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = Auth::user();
        // $categories=DB::table('categories')->get();
        $categories = Category::all();
        // $foods = Food::get($request->search);
        $foods =  DB::table('food')
                ->where('name', '=', $request->search)
                ->get();
        // $foods=Food::all();
        return view('index',['user' => $user,'categories' =>$categories,'foods' =>$foods]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $food = Food::find($id);
        $categories=Category::all();
        return view('edit-food',['user' => $user,'food' =>$food,'categories' =>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $id=$request->id;
        $link="food/edit/$id";

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category'=>'required',
            'featured' => 'required',
            'active' => 'required',
        ]);

        Food::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $request->image,
                'categoryid' => $request->category,
                'featured' => $request->featured,
                'active' => $request->active,
            ]);

            return redirect($link)->with('status', 'Data Sukses Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::destroy($id);
        return redirect('home')->with('status', 'Data Sukses Dihapus');
    }
}
