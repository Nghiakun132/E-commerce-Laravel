<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function index($slug){
        $product = DB::table('products')->where('pro_slug', $slug)->first();
        $related = DB::table('products')
        ->join('categories', 'products.pro_category_id','=','categories.id')->where('categories.id',$product->pro_category_id)->where('pro_slug','<>',$slug)->distinct()->limit(4)->get();
        $img = DB::table('anh')->where('product_slug',$slug)->get();
        $comment = DB::table('comment')
        ->join('users','users.id','=','comment.user_id')
        ->select('users.name','comment.*')
        ->where('product_slug',$slug)->limit(20)->get();
        Session::put('slug',$slug);
        // dd($proda_slug);
        return view('fronted.product_detail.index',compact('product','related','img','comment'));
    }
    public function comment(Request $request){
        $id = Session::get('user_id');
        if($id != null){
        $proda_slug = Session::get('slug');
        // dd($proda_slug);
            $data= array();
            $data['user_id'] = $id;
            $data['product_slug'] = $proda_slug;
            $data['comment'] = $request->comment;
            $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            DB::table('comment')->insert($data);
        return Redirect()->back();
     }else{
        return Redirect()->route('login');
     }
    }
     public function like_comment($id){
        $like = array();
        $data = DB::table('comment')->where('id', $id)->select('comment.liked')->first();
        $like['liked'] = $data->liked + 1;
        // dd($like);
        DB::table('comment')->where('id',$id)->update($like);
        return Redirect()->back();
     }

}
