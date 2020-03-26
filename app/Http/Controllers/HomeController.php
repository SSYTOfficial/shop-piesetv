<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Categories::count();
        $headCat = Categories::take(3)->get();
        $allCat = Categories::skip(3)->take($count - 3)->get();
        $products = Product::inRandomOrder()->limit(8)->get();
        return view('home', compact('products', 'headCat', 'allCat'));
    }

    public function livrare() {
        $count = Categories::count();
        $headCat = Categories::take(3)->get();
        $allCat = Categories::skip(3)->take($count - 3)->get();
        return view('livrare', compact('headCat', 'allCat'));
    }
}