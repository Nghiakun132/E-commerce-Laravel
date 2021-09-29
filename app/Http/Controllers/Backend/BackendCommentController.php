<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class BackendCommentController extends Controller
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
        $comment = DB::table('comment')
            ->join('users', 'users.id', '=', 'comment.user_id')
            ->join('products', 'products.pro_slug', '=', 'comment.product_slug')
            ->select('comment.*', 'users.name', 'products.pro_avatar', 'products.pro_name')
            ->get();
        $view = [
            'comment' => $comment,
        ];
        return view('backend.comment.index', $view);
    }
    public function delete_comment($id)
    {
        $this->AuthLogin();
        DB::table('comment')->where('id', $id)->delete();
        return Redirect()->back();
    }
}
