<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class BackendCouponController extends Controller
{
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
        $coupon = DB::table('coupon')->orderby('cp_id')
        ->join('users','users.id','=','coupon.cp_user_id')
        ->select('users.name','coupon.*')
        ->get();
        $countCoupon  = count($coupon);
        $view =[
            'countCoupon' => $countCoupon,
            'coupon' => $coupon,
        ];
        return view('backend.coupon.index',$view);
    }
}
