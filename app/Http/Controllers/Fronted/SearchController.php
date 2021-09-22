<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function adu(){
        // $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $rd = substr(str_shuffle($permitted_chars),0,10);
        $id  = 3;
        $solan = 1;
        $vc = DB::table('coupon')->inRandomOrder()->first();
        return view('fronted.search.adu',compact('vc','id','solan'));
    }
    public function search(Request $request){
        return '1232';
    }
}
