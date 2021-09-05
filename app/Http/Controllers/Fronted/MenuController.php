<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index($slug){
        $menus = DB::table('menus')
        ->join('articles','articles.a_menu_id','=','menus.id')->where('menus.mn_slug',$slug)->get();
        $menus_late = DB::table('menus')
        ->join('articles','articles.a_menu_id','=','menus.id')->where('menus.mn_slug',$slug)->orderBy('articles.id','DESC')->limit(3)->get();
        $view = [
            'menus' => $menus,
            'menus_late' => $menus_late,
        ];
        return view('fronted.menu.index',$view);
    }
}
