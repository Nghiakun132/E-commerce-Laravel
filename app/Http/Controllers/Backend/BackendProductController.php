<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendProductRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class BackendProductController extends Controller
{
    protected $folder = 'backend.product.';
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return redirect()->route('get_backend.home');
        }else{
            return redirect()->route('get_backend.login')->send();
        }
    }
    public function index()
    {
        $this->AuthLogin();
        $products = Product::orderBy('id')
            ->paginate(20);

        $viewData = [
            'products' => $products,
        ];
        return view($this->folder . 'index', $viewData);
    }
    public function create()
    {
        $this->AuthLogin();
        $product = DB::table('products')->get();
        $categories = Category::all();
        $viewData = [
            'product' => $product,
            'categories' => $categories,
        ];
        return view($this->folder . 'create', $viewData);
    }
    public function store(BackendProductRequest $request)
    {
        $this->AuthLogin();
        $data = $request->except('_token', 'pro_avatar');
        $data['pro_slug'] = Str::slug($request->pro_name);
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if(isset($image['code'])){
                $data['pro_avatar'] = $image['name'];
            }
        }
        $products = Product::create($data);
        return Redirect()->back();
    }

    public function edit($id)
    {
        $this->AuthLogin();
        $categories = Category::all();
        $product = Product::find($id);
        $viewData = [
            'product' => $product,
            'categories' => $categories,
        ];
        return view($this->folder . 'update', $viewData);
    }

    public function update(BackendProductRequest $request, $id)
    {
        $this->AuthLogin();
        $data = $request->except('_token', 'pro_avatar');
        $data['pro_slug'] = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if(isset($image['code'])){
                $data['pro_avatar'] = $image['name'];
            }

        }
        Product::find($id)->update($data);
        // return redirect()->route(route:'get_backend.product.index');
        return redirect()->route(route: 'get_backend.product.index');
    }
    public function delete($id)
    {
        $this->AuthLogin();
        \DB::table('products')->where('id', $id)->delete();
        return redirect()->route(route: 'get_backend.product.index');
    }
    public function change_status($id){
        $data = array();
        $status = DB::table('products')->where('id', $id)->first();
        // dd($status);
        if($status->pro_status == 0){
        $data['pro_status'] = 1;
        }else{
            $data['pro_status'] = 0;
        }
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->Route('get_backend.product.index');
    }

    public function add_img($id){
        $product = DB::table('products')->where('id',$id)->first();
        // dd($product);
        return view('backend.product.img_product',compact('product'));
    }
    public function add_image(Request $request){
        $data =array();
        $data = $request->except('_token', 'pro_avatar');
        $data['product_slug'] = $request->product_slug;
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if(isset($image['code'])){
                $data['anh'] = $image['name'];
            }
        }
        DB::table('anh')->insert($data);
        return redirect()->route('get_backend.product.index');
    }


}
