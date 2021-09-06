<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function index($slug){
        $product = DB::table('products')->where('pro_slug', $slug)->first();
        $related = DB::table('products')
        ->join('categories', 'products.pro_category_id','=','categories.id')->where('categories.id',$product->pro_category_id)->distinct()->limit(4)->get();
        return view('fronted.product_detail.index',compact('product','related'));
    }


}
