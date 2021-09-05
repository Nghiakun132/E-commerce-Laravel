<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleDetailController extends Controller
{
     public function index($slug){
        $articles = DB::table('articles')
        ->join('admins','admins.id','=','articles.admin_id')
        ->where('articles.a_slug',$slug)
        ->get();
        // $author= DB::table('articles')
        $menus_late = DB::table('menus')
        ->join('articles','articles.a_menu_id','=','menus.id')->limit(3)->inRandomOrder()->get();
         $view =[
             'articles'=>$articles,
             'menus_late'=>$menus_late,
            //  'author' =>$author,
            ];
        return view('fronted.article_detail.index',$view);
    }
}
