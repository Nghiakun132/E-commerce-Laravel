<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('fronted.user.index');
    }


    public function create(request $request){

        return view('fronted.user.create');
    }
    // public function ip(Request $request){
    //     $ip = $request->ip();
    //     return view('fronted.user.test',compact('ip'));
    // }
}
