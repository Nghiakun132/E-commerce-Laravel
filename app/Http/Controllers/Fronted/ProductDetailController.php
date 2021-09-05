<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($slug){
        $product = Product::where('pro_slug', $slug)->first();
        return view('fronted.product_detail.index',compact('product'));
    }
}
