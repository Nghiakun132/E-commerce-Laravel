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
        // $status = DB::table('order')->select('order_status')->first();

        // dd($status);
        $order = DB::table('order')
        ->join('users','order.user_id','=','users.id')
        ->select('order.*','users.name')
        ->orderBy('order.id','asc')->get();
        $view=[
            'order' => $order,
        ];
        return view('backend.order.index',$view);
    }

        public function view_detail($id){
            $this->AuthLogin();
        $order_detail =DB::table('order')
        ->join('users','order.user_id','=','users.id')
        ->join('order_detail','order.id','=','order_detail.order_id')
        ->where('order_detail.order_id','=',$id)
        ->select('order.*','order_detail.*','users.*')
        ->orderBy('order.id','asc')->get();
        $view_detail=[
            'order_detail' => $order_detail,
        ];
        return view('backend.order.view_detail',$view_detail);
        }


        public function delete_order($id){
            $this->AuthLogin();
           DB::table('order')
            ->where('id', $id)->delete();
            return Redirect()->route('get_backend.order.index');
        }
        public function change_status($id){
            $this->AuthLogin();
            $status = DB::table('order')->select('order_status')->where('id', $id)->first();
            // $status = int($status);
            // dd($status);
            if($status->order_status == 0){
                $data['order_status'] = 1;
            }else if($status->order_status == 1){
                $data['order_status'] = 2;
            }else if($status->order_status== 2){
                $data['order_status'] = 3;
            }
            $data['time_confirm']=Carbon::now('Asia/Ho_Chi_Minh');
            DB::table('order')
            ->where('id', $id)->update($data);
            return Redirect()->route('get_backend.order.index');
        }
}
