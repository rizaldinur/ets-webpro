<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        return view('categories',['user' => $user,'categories' =>$categories,'foods' =>$foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $validatedData['name']= $request->name;
    //     Category::create($validatedData);

        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'image' => $request->image,
        ]);

        // return redirect('/add-categories');
        return redirect('add-categories')->with('status', 'Data Sukses Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $category = Category::find($id);
        return view('edit-categories',['user' => $user,'category' =>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Menu::where('id',$request->id)
        //     ->update($validatedData);
        
        // return redirect('/add-categories');
        $id=$request->id;
        $link="category/edit/$id";

        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        Category::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'image'=>$request->image
            ]);

            return redirect($link)->with('status', 'Data Sukses Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $categorys=DB::table('categorys')->get();
        Category::destroy($id);
        return redirect('home')->with('status', 'Data Sukses Dihapus');
    }
}
