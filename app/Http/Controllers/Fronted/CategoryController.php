<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $folder = 'fronted.category.';
    public function index(Request $request, $slug)
    {
        $category = Category::where('c_slug', $slug)->first();
        $product = Product::where('pro_category_id', $category->id)
            ->where('products.pro_status', 0)
            // ->orderBy('pro_price','ASC')
            ->get();
        $sales = DB::table('products')
            ->where('pro_category_id', $category->id)
            ->where('pro_sale', '>', 0)
            ->where('products.pro_status', 0)
            ->limit(3)->get();
        // dd($sales);
        $lates = Product::where('pro_category_id', $category->id)
            ->where('products.pro_status', 0)
            ->limit(3)
            ->orderbyDesc('id')
            ->get();
        $count = count($product);

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'tangdan') {
                $product = Product::where('pro_category_id', $category->id)
                    ->where('products.pro_status', 0)
                    ->orderBy('pro_price', 'ASC')
                    ->get();
            }else if($sort_by =='giamdan'){
                $product = Product::where('pro_category_id', $category->id)
                ->where('products.pro_status', 0)
                ->orderBy('pro_price', 'DESC')
                ->get();
            }else if ($sort_by=='none'){
                $product = Product::where('pro_category_id', $category->id)
                ->where('products.pro_status', 0)
                ->get();
            }
        }
        return view($this->folder . 'index', compact('product', 'sales', 'lates', 'count'));
    }
}
