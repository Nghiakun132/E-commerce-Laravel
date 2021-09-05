<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendTagRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Tag;
use Session;

class BackendTagController extends Controller
{
    protected $folder= 'backend.tag.';

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
        $tags = Tag::orderBy('id')->get();

        $viewData =[
            'tags' =>$tags
        ];
        return view($this->folder.'index',$viewData);
    }

    public function store(BackendTagRequest $request){
        $this->AuthLogin();
        $data = $request->except('_token');
        $data['t_slug'] = Str::slug($request->t_name);
        $data['create_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $tags = Tag::create($data);
        return redirect()->back();

    }

    public function edit($id){
        $this->AuthLogin();
        $tag = Tag::find($id);
        $tags = Tag::orderBy('id')->get();

        $viewData =[
            'tags' =>$tags,
            'tag' =>$tag
        ];
        return view($this->folder.'update',$viewData);

    }
    public function delete($id){
        $this->AuthLogin();
        \DB::table('tags')->where('id', $id)->delete();
        return redirect()->route(route:'get_backend.tag.index');
    }
    public function update(BackendTagRequest $request,$id){
        $this->AuthLogin();
        $data = $request->except('_token');
        $data['t_slug'] = Str::slug($request->t_name);
        $data['update_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        Tag::find($id)->update($data);
        return redirect()->route(route:'get_backend.tag.index');
    }
}
