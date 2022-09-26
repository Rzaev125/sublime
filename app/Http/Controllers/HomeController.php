<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        // return auth()->user()->id;
        $products = Product::orderBy('created_at',)->take(8)->get();

        return view('home.index', [
            'products' => $products
        ]);
    }
}
