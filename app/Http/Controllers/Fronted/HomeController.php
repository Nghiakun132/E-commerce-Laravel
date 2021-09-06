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
    public function index(){
        $product = DB::table('products')->select('*')
        ->join('categories','products.pro_category_id','=', 'categories.id')->limit(8)
        ->get();
        $products = DB::table('products')->select('*')->limit(3)->get();
        $topViews = DB::table('products')->select('*')->orderBy('pro_view','DESC')->limit(3)->get();
        return view($this->folder.'index',compact('products','topViews','product'));
    }
    public function login() {
        return view('fronted.home.login');
    }
    public function search(Request $request) {
        $keywords = $request->tukhoa;
        $products = DB::table('products')->where('pro_name','like','%'.$keywords.'%')->get();
        $count = count($products);
        $view=[
            'products' => $products,
            'count' => $count,
        ];
        return view('fronted.search.index',compact('products','count'));
    }
    public function update_tt(){
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
}
