<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class BackendOrderController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return redirect()->route('get_backend.home');
        }else{
            return redirect()->route('get_backend.login')->send();
        }
    }
    public function index(){
        $this->AuthLogin();
        $order = DB::table('product_bought')
        ->join('users','product_bought.pk_user_id','=','users.id')
        ->join('orders','orders.id','=','product_bought.pk_order_id')
        ->orderBy('orders.id','asc')
        ->get();
        $countOrder = count($order);
        $view=[
            // 'address' => $address,
            'countOrder' => $countOrder,
            'order' => $order,
        ];
        return view('backend.order.index',$view);
    }

        public function view_detail($id){
            $this->AuthLogin();
        $order_detail =DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('order_detail','orders.id','=','order_detail.order_id')
        ->where('order_detail.order_id','=',$id)
        ->select('orders.*','order_detail.*','users.*')
        ->orderBy('orders.id','asc')->get();
        $view_detail=[
            'order_detail' => $order_detail,
        ];
        return view('backend.order.view_detail',$view_detail);
        }


        public function delete_order($id){
            $this->AuthLogin();
           DB::table('orders')
            ->where('id', $id)->delete();
            DB::table('order_detail')
            ->where('order_id', $id)->delete();
            return Redirect()->route('get_backend.order.index');
        }
        public function change_status($id){
            $this->AuthLogin();
            //thay doi trang thai don hang
            $status = DB::table('orders')->select('order_status')->where('id', $id)->first();
            $order_detail = DB::table('order_detail')->where('order_id', $id)->get();

            if($status->order_status == 0){
                foreach ($order_detail as $v2) {
                    $product_id = $v2->product_id;
                    $qty = DB::table('products')->select('pro_number')->where('id', $product_id)->first();
                    $sl = $v2->product_qty;
                    $soluong['pro_number'] = $qty->pro_number - $sl;
                    DB::table('products')->where('id', $product_id)->update($soluong);
                }
                $data['order_status'] = 1;

            }else if($status->order_status == 1){
                $data['order_status'] = 2;
            }else if($status->order_status== 2){
                $data['order_status'] = 3;
            }
            $data['time_confirm']=Carbon::now('Asia/Ho_Chi_Minh');
            $data['admin_id'] = Session::get('id');
            DB::table('orders')
            ->where('id', $id)->update($data);
            return Redirect()->route('get_backend.order.index');
        }
}
