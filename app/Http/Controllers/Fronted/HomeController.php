<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{   protected $folder = 'fronted.home.';
    public function index(){
        $products = DB::table('products')->select('*')->limit(3);
        $products = $products->get();
        $topViews = DB::table('products')->select('*')->orderBy('pro_view','DESC')->limit(3);
        $topViews = $topViews->get();
        return view($this->folder.'index',compact('products','topViews'));
    }
    public function login() {
        return view('fronted.home.login');
    }

}
