<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BackendUserController extends Controller
{
    protected $folder= 'backend.user.';
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return redirect()->route('get_backend.home');
        }else{
            return redirect()->route('get_backend.login')->send();
        }
    }
    public function index(){
        $user = DB::table('users')
        ->join('address','address.user_id','=','users.id')->get();
        $no_user = DB::table('shipping')->get();
        $data = [
            'user' => $user,
            'no_user' => $no_user,
        ];
        return view($this->folder.'index',$data);
    }

    public function delete($id){
        DB::table('users')->where('id',$id)->delete();
        return Redirect()->route('get_backend.user.index');
    }
    public function delete_shipping($id){
        DB::table('shipping')->where('id',$id)->delete();
        return Redirect()->route('get_backend.user.index');
    }

}
