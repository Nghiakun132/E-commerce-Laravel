<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{   protected $folder = 'fronted.home.';
    public function AuthLogin(){
        $id = Session::get('user_id');
        if($id){
            return redirect()->route('get.home');
        }else{
            return redirect()->route('login')->send();
        }
    }
    public function index(){
        $product = DB::table('products')->select('products.*','categories.c_slug')
        ->join('categories','products.pro_category_id','=', 'categories.id')->limit(8)
        ->get();
        // dd($product);
        $products = DB::table('products')->select('*')->limit(3)->get();
        $topViews = DB::table('products')->select('*')->orderBy('pro_view','DESC')->limit(3)->get();
        $blog = DB::table('articles')->limit(3)->inRandomOrder()->get();
        return view($this->folder.'index',compact('products','topViews','product','blog'));
    }
    public function login() {
        return view('fronted.home.login');
    }
    public function search(Request $request) {
        $keywords = $request->tukhoa;
        $products = DB::table('products')->where('pro_name','like','%'.$keywords.'%')->limit(20)->get();
        $count = count($products);
        $view=[
            'products' => $products,
            'count' => $count,
        ];
        return view('fronted.search.index',compact('products','count'));
    }
    public function update_tt(){
        $this->AuthLogin();
        $id = Session::get('user_id');
        $user = DB::table('users')
        ->join('address','address.user_id','=','users.id')
        ->where('users.id',$id)->limit(1)->get();
        // dd($user);
        $view =[
            'user' => $user,
        ];
        return view('fronted.home.update',$view);
    }
    public function update(Request $request){
        $user_id = Session::get('user_id');
        $data= array();
        $data2 =array();
        $data['name']  = $request->name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password,false);
        $data['phone'] = $request->phone;
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('users')->where('id',$user_id)->update($data);
        $data2['address'] = $request->address;
        // $data2['user_id'] = $user_id;
        $data2['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('address')->where('user_id',$user_id)->update($data2);
        return Redirect()->Route('get.home');
    }
    public function add_favorite($id){
        $this->AuthLogin();
        $in =array();
        $in['user_id'] = Session::get('user_id');
        $in['product_id'] = $id;
        $in['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('favorite_product')->insert($in);
        return Redirect()->Route('fronted.home.favorite');
    }
    public function view_favorite(){
        $this->AuthLogin();
        $user = Session::get('user_id');
        $data = DB::table('favorite_product')
        ->join('products','products.id','=','favorite_product.product_id')
        ->join('users', 'users.id','=','favorite_product.user_id')
        ->where('user_id',$user)
        ->get();
        // dd($data);
        $view=[
            'data' => $data,
        ];
        return view('fronted.home.favorite',$view);
    }

    public function delete_favorite($id){
        $user = Session::get('user_id');
        DB::table('favorite_product')->where('user_id',$user)->where('product_id',$id)->delete();
        return Redirect()->Route('fronted.home.favorite');

    }
    public function tracking_order(){
        $this->AuthLogin();
        $id = Session::get('user_id');
        $order = DB::table('order')->where('user_id',$id)->get();
        $view =[
            'order' =>$order,
        ];
        return view('fronted.home.check_order',$view);
    }
}
