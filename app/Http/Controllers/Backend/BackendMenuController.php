<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendMenuRequest;
use Illuminate\Support\Str;
use App\Models\Menu;
use Carbon\Carbon;
use Session;

class BackendMenuController extends Controller
{
    protected $folder= 'backend.menu.';
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
        $menus = Menu::orderBy('id')->get();
        $viewData = [
            'menus' => $menus,
        ];
        return view($this->folder.'index',$viewData);
    }

    public function store(BackendMenuRequest $request) {
        $this->AuthLogin();
        $data = $request->except('_token');
        $data['mn_slug'] = Str::slug($request->mn_name);
        $data['create_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $menus = Menu::create($data);
        return redirect()->back();
    }

    public function edit($id){
        $this->AuthLogin();
        $menu =Menu::find($id);
        $menus = Menu::orderBy('id')->get();

        $viewData =[
            'menus' =>$menus,
            'menu' =>$menu
        ];
        return view($this->folder.'update',$viewData);

    }
    public function delete($id){
        $this->AuthLogin();
        \DB::table('menus')->where('id', $id)->delete();
        return redirect()->route(route:'get_backend.menu.index');
    }
    public function update(BackendMenuRequest $request ,$id){
        $this->AuthLogin();
        $data = $request->except('_token');
        $data['mn_slug'] = Str::slug($request->mn_name);
        $data['update_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        Menu::find($id)->update($data);
        return redirect()->route(route:'get_backend.menu.index');
    }
}
