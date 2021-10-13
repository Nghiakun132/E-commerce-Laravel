<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BackendImportController extends Controller
{
    public function index(){
        $import = DB::table('import_product')
        ->join('import_product_details','import_product_details.ipd_ip_id','=','import_product.ip_id')
        ->join('products','import_product_details.ipd_product_id','=','products.id')
        ->join('admins','admins.id','=','import_product.ip_admin_id')
        ->select('admins.name','import_product.*','import_product_details.*','products.pro_name','products.pro_avatar')
        ->orderBy('import_product.ip_id','asc')
        ->get();
        // dd($import);
        return view('backend.import.index',compact('import'));
    }
    public function change_status($ip_id){
        // $id_admin = Session::get('id');
        $data = array();
        $import_product = DB::table('import_product')->where('ip_id', $ip_id)->first();
        if($import_product->ip_status == 0)
            $data['ip_status'] = 1;
        // $data['ip_admin_id'] = $id_admin;
        $data['ip_confirmed'] = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('import_product')->where('ip_id', $ip_id)->update($data);
        return Redirect()->back();
    }
}


// $import2 = DB::table('import_product')->first();
// // ->where('ip_created_at','>',$now->subMonth(1))
// $now = Carbon::now('Asia/Ho_Chi_Minh');
// $import = (Carbon::create($import2->ip_created_at)->day);
// $month = DB::table('import_product')->where('ip_created_at','<',$now)->where('ip_created_at','>=',$import)->first();
// dd($month);
// return view('backend.import.index',compact('import','month','now'));
