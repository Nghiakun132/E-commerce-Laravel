<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $staff = DB::table('admins')->get();
        return view('backend.staff.index',compact('staff'));
    }
    public function add_staff(){
        return view('backend.staff.add_staff');
    }
}
