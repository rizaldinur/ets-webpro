<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Food;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // $categories=DB::table('categories')->get();
        $categories = Category::all();
        $foods = Food::all();
        // $foods = DB::table('foods')->get();
        return view('index',['user' => $user,'categories' =>$categories,'foods' =>$foods]);
    }
}
