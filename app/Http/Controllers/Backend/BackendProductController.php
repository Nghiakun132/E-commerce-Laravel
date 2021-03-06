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
    public function AuthLogin()
    {
        $id = Session::get('id');
        if ($id) {
            return redirect()->route('get_backend.home');
        } else {
            return redirect()->route('get_backend.login')->send();
        }
    }
    public function index()
    {
        $this->AuthLogin();
        $products = Product::orderBy('id')
            ->paginate(20);
            $countProduct = Product::count('id');
            $categories = Category::all();

        $viewData = [
            'products' => $products,
            'countProduct' => $countProduct,
            'categories' => $categories,
        ];
        return view($this->folder . 'index', $viewData);
    }
    // public function create()
    // {
    //     $this->AuthLogin();
    //     $product = DB::table('products')->get();
    //     $categories = Category::all();
    //     $viewData = [
    //         'product' => $product,
    //         'categories' => $categories,
    //     ];
    //     return view($this->folder . 'create', $viewData);
    // }
    public function store(Request $request)
    {
        //add product
        $this->AuthLogin();

        $this->validate($request,
            [
                'pro_name' => 'required|unique:products,pro_name',
                'pro_category_id' => 'required',
                'pro_price' => 'required',
                'pro_kho' => 'required',
                'pro_unit' => 'required',
                'pro_avatar' => 'required',
            ],
            [
                'pro_name.required' => 'Bạn chưa nhập tên sản phẩm',
                'pro_name.unique' => 'Tên sản phẩm đã tồn tại',
                'pro_category_id.required' => 'Bạn chưa chọn danh mục',
                'pro_price.required' => 'Bạn chưa nhập giá sản phẩm',
                'pro_kho.required' => 'Bạn chưa nhập số lượng sản phẩm',
                'pro_unit.required' => 'Bạn chưa nhập đơn vị tính',
                'pro_avatar.required' => 'Bạn chưa chọn ảnh sản phẩm',
            ]);
        $data = $request->except('_token', 'pro_avatar');
        $data['pro_slug'] = Str::slug($request->pro_name);
        $data['pro_number'] = $request->pro_kho;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if (isset($image['code'])) {
                $data['pro_avatar'] = $image['name'];
            }
        }
        $products = Product::create($data);
        //add import_product
        $admin_id = Session::get('id');
        $import = array();
        $import['ip_admin_id'] = $admin_id;
        $import['ip_price_total'] = $request->pro_price * $request->pro_kho;
        $import['ip_created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $ip_id = DB::table('import_product')->insertGetId($import);
        $id_product = DB::table('products')->orderBy('id', 'DESC')->first();
        //add import_product_details
        $import_product_details = array();
        $import_product_details['ipd_ip_id'] = $ip_id;
        $import_product_details['ipd_product_id'] = $id_product->id;
        $import_product_details['ipd_product_qty'] = $request->pro_kho;
        $import_product_details['ipd_price'] = $request->pro_price;
        $import_product_details['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('import_product_details')->insert($import_product_details);
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

    public function update_product(Request $request, $id)
    {
        $this->AuthLogin();
        $pd = DB::table('products')->where('id', $id)->first();
        $data = array();
        $data = $request->except('_token', 'pro_avatar');
        $data['pro_name'] = $request->pro_name;
        $data['pro_category_id'] = $request->pro_category_id;
        $data['pro_slug'] = Str::slug($request->pro_name);
        $data['pro_description'] = $request->pro_description;
        $data['pro_content'] = $request->pro_content;
        $data['pro_price'] = $request->pro_price;
        if ($request->pro_kho != $pd->pro_kho) {
            $data['pro_number'] = $pd->pro_number + $request->pro_kho;
            $data['pro_kho'] = $pd->pro_kho + $request->pro_kho;
        } else {
            $data['pro_kho'] = $request->pro_kho;
            $data['pro_number'] = $request->pro_kho;
        }
        // $data['pro_kho'] = $request->pro_kho;
        $data['pro_sale'] = $request->pro_sale;
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if (isset($image['code'])) {
                $data['pro_avatar'] = $image['name'];
            }
        }
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('products')->where('id', $id)->update($data);


        // add import_product
        if ($request->pro_kho != $pd->pro_kho) {
            $admin_id = Session::get('id');
            $import = array();
            $import['ip_admin_id'] = $admin_id;
            $import['ip_price_total'] = $request->pro_price * $request->pro_kho;
            $import['ip_created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            $ip_id = DB::table('import_product')->insertGetId($import);
            //add import_product_details
            $import_product_details = array();
            $import_product_details['ipd_ip_id'] = $ip_id;
            $import_product_details['ipd_product_id'] = $id;
            $import_product_details['ipd_product_qty'] = $request->pro_kho;
            $import_product_details['ipd_price'] = $request->pro_price;
            $import_product_details['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            DB::table('import_product_details')->insert($import_product_details);
        }
        return redirect()->route('get_backend.product.index');
    }
    public function delete($id)
    {
        $this->AuthLogin();
        $image = DB::table('products')->select('pro_slug')->where('id', $id)->first();
        \DB::table('products')->where('id', $id)->delete();
        \DB::table('anh')->where('product_slug',$image->pro_slug)->delete();
        return redirect()->route('get_backend.product.index');
    }
    public function change_status($id)
    {
        $this->AuthLogin();
        $data = array();
        $status = DB::table('products')->where('id', $id)->first();
        // dd($status);
        if ($status->pro_status == 0) {
            $data['pro_status'] = 1;
        } else {
            $data['pro_status'] = 0;
        }
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->Route('get_backend.product.index');
    }

    public function add_img($id)
    {
        $this->AuthLogin();
        $product = DB::table('products')->where('id', $id)->first();
        // dd($product);
        return view('backend.product.img_product', compact('product'));
    }
    public function add_image(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data = $request->except('_token', 'pro_avatar');
        $data['product_slug'] = $request->product_slug;
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if (isset($image['code'])) {
                $data['anh'] = $image['name'];
            }
        }
        DB::table('anh')->insert($data);
        return redirect()->back();
    }
}
