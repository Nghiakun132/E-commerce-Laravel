<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendPasswordRequest;
use App\Http\Requests\BackendStaffRequest;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BackendHomeController extends Controller
{
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
        $total = DB::table('product_bought')
            ->join('orders', 'orders.id', '=', 'product_bought.pk_order_id')
            ->where('orders.order_status', '<>', 4)
            ->where('orders.order_status', '<>', 0)
            ->sum('pd_total');
        // dd($total);
        $user = DB::table('users')->count('id');
        $products_sell = DB::table('order_detail')
            ->join('orders', 'orders.id', '=', 'order_detail.order_id')
            ->where('orders.order_status', '<>', 4)
            ->sum('product_qty');
        $admins = DB::table('admins')->select('avatar')->first();
        $order = DB::table('product_bought')
            ->join('users', 'product_bought.pk_user_id', '=', 'users.id')
            ->join('orders', 'orders.id', '=', 'product_bought.pk_order_id')
            // ->where('orders.order_status', '<>', 4)
            ->orderBy('orders.id', 'desc')
            ->distinct()->limit(5)->get();
        $countOrder = count($order);
        $comment = DB::table('comment')->count('id');
        $sp = DB::table('products')->where('pro_status','<>',1)->get();
        $import = DB::table('import_product')->where('ip_status', 1)->sum('ip_price_total');
        // $order_new = DB::table('orders')->where('order_status',0)->count('id');
        $view = [
            // 'order_new'=>$order_new,
            'countOrder' => $countOrder,
            'order' => $order,
            'admins' => $admins,
            'total' => $total,
            'sp' => $sp,
            'comment' => $comment,
            'products_sell' => $products_sell,
            'import' => $import,
            'user' => $user,
        ];
        // Session::put('total', $total);
        // Session::put('users', $user);
        return view('backend.index', $view);
    }
    public function login()
    {
        return view('backend.login');
    }
    public function adminlogin(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required',
        //     'password' => 'required|min:7|max:32',
        // ], [
        //     'email.required' => 'B???n ch??a nh???p email',
        //     'password.required' => 'B???n ch??a nh???p m???t kh???u',
        //     'password.min' => 'M???t kh???u ph???i c?? ??t nh???t 8 k?? t???',
        //     'password.max' => 'M???t kh???u ch??? ???????c t???i ??a 32 k?? t???',
        // ]);

        $email = $request->email;
        $matkhau = md5($request->matkhau);

        $result = DB::table('admins')->where('email', $email)->where('password', $matkhau)->first();
        if ($result) {
            Session::put('name', $result->name);
            Session::put('id', $result->id);
            DB::table('admins')->where('id', $result->id)->update(['status' => 1]);
            return redirect()->route('get_backend.home');
        } else {
            Session::put('message', 'Email ho???c m???t kh???u kh??ng ch??nh x??c');
            return redirect()->route('get_backend.login');
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        DB::table('admins')->where('id', Session::get('id'))->update(['status' => 0]);
        Session::put('name', null);
        Session::put('id', null);
        return redirect()->route('get_backend.login');
    }
    public function change_info($id)
    {
        $admin_id = session::get('id');
        $info = DB::table('admins')->where('id', $id)->first();
        $team = DB::table('admins')->where('id', '<>', $id)->get();
        $count_imported = DB::table('import_product')->where('ip_admin_id', $id)->count('ip_id');
        $count_order = DB::table('orders')->where('admin_id', $admin_id)->where('order_status', '<>', 4)->count('id');
        $count_total = DB::table('orders')->where('admin_id', $admin_id)->where('order_status', '<>', 4)->sum('order_total');
        // dd($count_order);
        return view('backend.change_info', compact('info', 'count_imported', 'count_total', 'count_order', 'team'));
    }
    public function change(Request $request, $id)
    {
        $data = array();
        $data = $request->except('_token', 'avatar');
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['slogan'] = $request->slogan;
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        // $data['password'] = md5($request->password);
        if ($request->avatar) {
            $image = upload_image('avatar');
            if (isset($image['code'])) {
                $data['avatar'] = $image['name'];
            }
        }
        DB::table('admins')->where('id', $id)->update($data);
        return Redirect()->back();
    }
    public function change_password(Request $request, $id)
    {

        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:7|max:32',
            'cf_new_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'B???n ch??a nh???p m???t kh???u c??',
            'new_password.required' => 'B???n ch??a nh???p m???t kh???u m???i',
            'new_password.min' => 'M???t kh???u m???i ph???i c?? ??t nh???t 8 k?? t???',
            'new_password.max' => 'M???t kh???u m???i ch??? ???????c t???i ??a 32 k?? t???',
            'cf_new_password.required' => 'B???n ch??a nh???p l???i m???t kh???u m???i',
            'cf_new_password.same' => 'M???t kh???u m???i v?? x??c nh???n m???t kh???u m???i kh??ng tr??ng nhau',
        ]);

            $old_password = md5($request->old_password);
            $admin_id = session::get('id');
            $result = DB::table('admins')->where('id', $id)->where('password', $old_password)->first();
            if ($result) {
                $data['password'] = md5($request->new_password);
                DB::table('admins')->where('id', $id)->update($data);
            return redirect()->back();
            } else {
                Session::put('password_error', 'M???t kh???u c?? kh??ng ch??nh x??c');
                return Redirect()->back();
            }
        return redirect()->back();
    }
}
