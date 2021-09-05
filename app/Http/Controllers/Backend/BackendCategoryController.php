<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;

class BackendCategoryController extends Controller
{
    protected $folder= 'backend.category.';
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
        $categories = Category::orderBy('id')->get();
        $viewData = [
            'categories' => $categories,
        ];
        return view($this->folder.'index',$viewData);
    }

    public function store(BackendCategoryRequest $request) {
        $this->AuthLogin();
        $data = $request->except('_token');
        $data['c_slug'] = Str::slug($request->c_name);
        $data['create_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $categories = Category::create($data);
        return redirect()->back();
    }

    public function edit($id){
        $this->AuthLogin();
        $category = Category::find($id);
        $categories = Category::orderBy('id')->get();

        $viewData =[
            'categories' =>$categories,
            'category' =>$category
        ];
        return view($this->folder.'update',$viewData);

    }
    public function delete($id){
        $this->AuthLogin();
        \DB::table('categories')->where('id', $id)->delete();
        return redirect()->route(route:'get_backend.category.index');
    }
    public function update(BackendCategoryRequest $request,$id){
        $this->AuthLogin();
        $data = $request->except('_token');
        $data['c_slug'] = Str::slug($request->c_name);
        $data['update_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        Category::find($id)->update($data);
        return redirect()->route(route:'get_backend.category.index');
    }
}
