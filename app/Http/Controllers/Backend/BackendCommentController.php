<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendCommentController extends Controller
{
    public function index()
    {
        $comment = DB::table('comment')
            ->join('users', 'users.id', '=', 'comment.user_id')
            ->join('products', 'products.pro_slug', '=', 'comment.product_slug')
            ->select('comment.*', 'users.name', 'products.pro_avatar', 'products.pro_name')
            ->get();
        // dd($comment);
        $view = [
            'comment' => $comment,
        ];
        return view('backend.comment.index', $view);
    }
    public function delete_comment($id)
    {
        DB::table('comment')->where('id', $id)->delete();
        return Redirect()->back();
    }
}
