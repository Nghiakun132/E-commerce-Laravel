<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{   protected $folder = 'fronted.category.';
    public function index($slug){
        $category = Category::where('c_slug', $slug)->first();
        $product = Product::where('pro_category_id', $category->id)->get();
        $sales = Product::where('pro_category_id', $category->id)->where('pro_sale','>',0)->get();
        $lates = Product::where('pro_category_id', $category->id)->orderbyDesc('id')->get();
        $count = count($product);
        return view($this->folder.'index',compact('product','sales','lates','count'));
    }

}

