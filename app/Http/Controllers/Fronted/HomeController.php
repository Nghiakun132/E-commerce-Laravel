<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class HomeController extends Controller
{
    protected $folder = 'fronted.home.';
    public function AuthLogin()
    {
        $id = Session::get('user_id');
        if ($id) {
            return redirect()->route('get.home');
        } else {
            return redirect()->route('login')->send();
        }
    }
    public function index()
    {
        $product = DB::table('products')->select('products.*', 'categories.c_slug')
            ->join('categories', 'products.pro_category_id', '=', 'categories.id')
            ->where('products.pro_status', 0)
            ->limit(8)
            ->get();
        //

        //san pham moi nhat
        $products = DB::table('products')->select('*')
            ->where('products.pro_status', 0)
            ->orderBy('id', 'DESC')
            ->limit(3)->get();
        $topViews = DB::table('products')->select('*')
            ->where('products.pro_status', 0)
            ->orderBy('pro_view', 'DESC')->limit(3)->get();
        $blog = DB::table('articles')->limit(3)->inRandomOrder()->get();
        $topViewsCategory = DB::table('categories')->orderBy('c_view', 'DESC')->limit(3)->get();
        return view($this->folder . 'index', compact('products', 'topViews', 'product', 'blog', 'topViewsCategory'));
    }
    public function map()
    {
        return view($this->folder . 'map');
    }
    public function login()
    {
        return view('fronted.home.login');
    }
    public function search(Request $request)
    {
        $keywords = $request->tukhoa;
        $latesProduct = Product::orderBy('id', 'DESC')->where('pro_status','<>',1)->limit(3)->get();
        $products = Product::where('pro_name', 'like', '%' . $keywords . '%')->paginate(12);
        $count = count($products);
        return view('fronted.search.index', compact('products', 'count', 'latesProduct'));
    }
    // public function update_tt(){
    //     $this->AuthLogin();
    //     $id = Session::get('user_id');
    //     $user = DB::table('users')
    //     // ->join('address','address.user_id','=','users.id')
    //     ->where('users.id',$id)->first();
    //     // dd($user);
    //     // $address = DB::table('address')->where('user_id',$id)->get();
    //     $view =[
    //         // 'address' => $address,
    //         'user' => $user,
    //     ];
    //     return view('fronted.home.update',$view);
    // }
    public function update(Request $request)
    {
        $user_id = Session::get('user_id');
        $data = array();
        $data = $request->except('_token', 'avatar');
        $data['name']  = $request->name;
        $data['email'] = $request->email;
        // $data['password'] = md5($request->password);
        $data['phone'] = $request->phone;
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        if ($request->avatar) {
            $image = upload_image('avatar');
            if (isset($image['code'])) {
                $data['avatar'] = $image['name'];
            }
        }
        DB::table('users')->where('id', $user_id)->update($data);
        // $data2['address'] = $request->address;
        // // $data2['user_id'] = $user_id;
        // $data2['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        // DB::table('address')->where('user_id',$user_id)->update($data2);
        return Redirect()->back();
    }
    public function update_password(Request $request)
    {

        $this->validate(
            $request,
            [
                'old_password' => 'required|min:8|max:32',
                'new_password' => 'required|min:8|max:32',
                're_password' => 'required|same:new_password'
            ],
            [
                'old_password.required' => 'B???n ch??a nh???p m???t kh???u c??',
                'old_password.min' => 'M???t kh???u c?? ph???i c?? ??t nh???t 8 k?? t???',
                'old_password.max' => 'M???t kh???u c?? kh??ng ???????c v?????t qu?? 32 k?? t???',
                'new_password.required' => 'B???n ch??a nh???p m???t kh???u m???i',
                'new_password.min' => 'M???t kh???u m???i ph???i c?? ??t nh???t 8 k?? t???',
                'new_password.max' => 'M???t kh???u m???i kh??ng ???????c v?????t qu?? 32 k?? t???',
                're_password.required' => 'B???n ch??a nh???p l???i m???t kh???u m???i',
                're_password.same' => 'M???t kh???u nh???p l???i kh??ng kh???p'
            ]
        );

        $user_id = Session::get('user_id');
        $old_password = md5($request->old_password);
        $user = DB::table('users')->where('id', $user_id)->where('password',$old_password)->first();
        if ($user) {
            $data['password'] = md5($request->new_password);
            DB::table('users')->where('id', $user_id)->update($data);
            return redirect()->back()->with('pw_success', '?????i m???t kh???u th??nh c??ng');
        } else {
            return redirect()->back()->with('pw_error', 'M???t kh???u c?? kh??ng ????ng');
        }
    }
    public function add_favorite($id)
    {
        $this->AuthLogin();
        $in = array();
        $user_id = Session::get('user_id');
        $in['user_id'] = $user_id;
        $fv = DB::table('favorite_product')->where('product_id', $id)->where('user_id', $user_id)->first();
        // dd($fv);
        if ($fv != null)
            return Redirect()->Route('fronted.home.favorite')->with('favorite_message', 'S???n ph???m ???? t???n t???i');
        else {
            $in['product_id'] = $id;
            $in['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            DB::table('favorite_product')->insert($in);
            return Redirect()->Route('fronted.home.favorite');
        }
    }
    public function view_favorite()
    {
        $this->AuthLogin();
        $user = Session::get('user_id');
        $data = DB::table('favorite_product')
            ->join('products', 'products.id', '=', 'favorite_product.product_id')
            ->join('users', 'users.id', '=', 'favorite_product.user_id')
            ->select('products.*', 'favorite_product.user_id', 'favorite_product.product_id')
            ->where('user_id', $user)
            ->get();
        $countdata = count($data);
        // dd($countdata);
        // dd($data);
        $view = [
            'data' => $data,
            'countdata' => $countdata,
        ];
        return view('fronted.home.favorite', $view);
    }

    public function delete_favorite($id)
    {
        $user = Session::get('user_id');
        DB::table('favorite_product')->where('user_id', $user)->where('product_id', $id)->delete();
        return Redirect()->Route('fronted.home.favorite');
    }
    public function delete_all_favorite()
    {
        $user = Session::get('user_id');
        DB::table('favorite_product')->where('user_id', $user)->delete();
        return Redirect()->Route('fronted.home.favorite');
    }
    public function tracking_order()
    {
        $this->AuthLogin();
        $id = Session::get('user_id');
        $order = DB::table('orders')->where('user_id', $id)->orderBy('id', 'desc')
            ->get();
        $countOrder = count($order);
        $view = [
            'countOrder' => $countOrder,
            'order' => $order,
        ];
        return view('fronted.home.check_order', $view);
    }

    public function tracking_order_details($id)
    {
        $order = DB::table('orders')
            ->join('order_detail', 'order_detail.order_id', '=', 'orders.id')
            ->join('products', 'order_detail.product_id', '=', 'products.id')
            ->select('orders.id', 'order_detail.*', 'products.pro_avatar')
            ->where('order_detail.order_id', $id)
            ->get();
        // dd($order);
        $view = [
            'order' => $order,
        ];
        return view('fronted.home.check_order_detail', $view);
    }
    // public function add_address(){
    //     return view('fronted.home.add_address');
    // }
    public function add(Request $request)
    {
        $id = Session::get('user_id');
        // dd($id);
        $data = array();
        $data['address'] = $request->address_new;
        $data['user_id'] = $id;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('address')->insert($data);
        return Redirect()->back();
        // return view('fronted.home.view');
        // return view('fronted.home.index');
    }
    public function view_data()
    {
        $this->AuthLogin();
        $id = Session::get('user_id');
        $user = DB::table('users')
            ->where('users.id', $id)->first();
        $view = [
            'user' => $user,
        ];
        return view('fronted.home.view', $view);
    }
    public function update_address()
    {
        $this->AuthLogin();
        $id = Session::get('user_id');
        $user = DB::table('users')
            ->join('address', 'address.user_id', '=', 'users.id')
            ->select('users.name', 'users.phone', 'address.*')
            ->where('users.id', $id)->get();
        // dd($user);
        $view = [
            'user' => $user,
        ];
        return view('fronted.home.update_address', $view);
    }
    public function edit_address($id)
    {
        $address = DB::table('address')->where('id', $id)->first();
        return view('fronted.home.edit_address', compact('address'));
    }
    public function edit(Request $request, $id)
    {
        $data = array();
        $data['address'] = $request->address_new;
        DB::table('address')->where('id', $id)->update($data);
        return Redirect()->back();
    }
    public function change_address($id)
    {
        $user_id = Session::get('user_id');
        $status = DB::table('address')->where('user_id', $user_id)->where('id', $id)->first();
        $status2 = DB::table('address')->where('user_id', $user_id)->first();
        $data = array();
        if ($status->status == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        DB::table('address')->where('id', $id)->update($data);
        return redirect()->back();
    }

    public function delete_address($id)
    {
        $user_id = Session::get('user_id');
        DB::table('address')->where('user_id', $user_id)->where('id', $id)->delete();
        return redirect()->back();
    }
    public function cancel($id)
    {
        $user_id = Session::get('user_id');
        $order = DB::table('orders')->where('orders.id', $id)->where('user_id', $user_id)
            ->join('order_detail', 'order_detail.order_id', '=', 'orders.id')
            ->first();
        // dd($order);
        return view('fronted.home.cancel_order', compact('order'));
    }
    public function cancel_order(Request $request, $id)
    {
        //cancel_order


        $data = array();
        $user_id = Session::get('user_id');
        $data['order_status'] = 4;
        DB::table('orders')->where('user_id', $user_id)->where('id', $id)->update($data);
        //insert to cancel_order table
        $order_cancel['order_id'] = $id;
        $order_cancel['reason'] = $request->reason;
        DB::table('order_cancel')->insert($order_cancel);

        //

        $order = DB::table('order_detail')->where('order_id', $id)->get();
        foreach ($order as $v2) {
            $soluong = array();
            $product_id = $v2->product_id;
            $qty = DB::table('products')->select('pro_number')->where('id', $product_id)->first();
            $sl = $v2->product_qty;
            $soluong['pro_number'] = $qty->pro_number + $sl;
            DB::table('products')->where('id', $product_id)->update($soluong);
        }





        return redirect()->route('fronted.home.tracking_order');
    }
    //ma giam gia
    public function view_coupon()
    {
        $user_id = Session::get('user_id');
        $coupon = DB::table('coupon')->where('cp_user_id', $user_id)->get();

        return view('fronted.user.coupon', compact('coupon'));
    }
}
