<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::all();
        $data = $products->isEmpty() ? 0 : $products;
        return view('dashboard.index', ['products' => $data]);
    }
}
