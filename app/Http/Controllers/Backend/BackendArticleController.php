<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendArticleRequest;
use App\Models\Menu;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Session;

class BackendArticleController extends Controller
{
    protected $folder= 'backend.article.';
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return redirect()->route('get_backend.home');
        }else{
            return redirect()->route('get_backend.login')->send();
        }
    }
    public function index(){
        $this->AuthLogin();
        $articles = Article::orderBy('id')
        ->paginate(20);

        $viewData = [
            'articles' => $articles
        ];
        return view($this->folder.'index',$viewData);
    }
    public function add(){
        $menus = Menu::all();
        $view=[
            'menus' => $menus,
        ];
        return view($this->folder.'create',$view);
    }
    public function add_article(Request $request){
            $admin_id =Session::get('id');
            $data = array();
            $data = $request->except('_token','a_avatar');
            $data['a_name'] =$request ->a_name;
            $data['a_menu_id'] =$request ->a_menu_id;
            $data['a_slug'] =Str::slug($request->a_name);
            $data['a_description'] =$request ->a_description;
            $data['a_content'] =$request ->a_content;
            $data['admin_id'] = $admin_id;
            $data['created_at'] =  Carbon::now('Asia/Ho_Chi_Minh');
            if ($request->a_avatar) {
                $image = upload_image('a_avatar');
                if(isset($image['code'])){
                    $data['a_avatar'] = $image['name'];
                }
            }
            DB::table('articles')->insert($data);
        return Redirect()->route('get_backend.article.index');
    }
    public function edit($id) {
        $menus = DB::table('menus')->get();
        $articles = DB::table('articles')->where('id', $id)->get();
        $view=[
            'articles' => $articles,
            'menus' => $menus,
        ];
        return view($this->folder.'update',$view);
    }
    public function update(Request $request, $id){

            $data = array();
            $data = $request->except('_token','a_avatar');
            $data['a_name'] = $request->a_name;
            $data['a_menu_id'] = $request->a_menu_id;
            $data['a_description'] = $request->a_description;
            $data['a_content'] = $request->a_content;
            $data['a_slug'] = Str::slug($request->a_name);
            $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            if ($request->a_avatar) {
                $image = upload_image('a_avatar');
                if(isset($image['code'])){
                    $data['a_avatar'] = $image['name'];
                }
            }
            DB::table('articles')->where('id', $id)->update($data);
        return Redirect()->route('get_backend.article.index');
    }
    public function delete_article($id) {
        DB::table('articles')->where('id', $id)->delete();
        return Redirect()->route('get_backend.article.index');
    }

}
