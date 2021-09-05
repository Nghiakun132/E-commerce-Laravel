<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Keyword;
use App\Http\Requests\BackendKeywordRequest;
use Session;

class BackendKeywordController extends Controller
{
    protected $folder= 'backend.keyword.';
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
        $keywords = Keyword::orderBy('id')->get();

        $viewData =[
            'keywords' =>$keywords
        ];
        return view($this->folder.'index',$viewData);
    }


    public function store(BackendKeywordRequest $request){
        $this->AuthLogin();
        $data = $request->except('_token');
        $data['k_slug'] = Str::slug($request->k_name);
        $data['create_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $keywords = Keyword::create($data);
        return redirect()->back();

    }


    public function edit($id){
        $this->AuthLogin();
        $keyword = Keyword::find($id);
        $keywords = Keyword::orderBy('id')->get();

        $viewData =[
            'keywords' =>$keywords,
            'keyword' =>$keyword
        ];
        return view($this->folder.'update',$viewData);

    }
    public function delete($id){
        $this->AuthLogin();
        \DB::table('keywords')->where('id', $id)->delete();
        return redirect()->route(route:'get_backend.keyword.index');
    }
    public function update(BackendKeywordRequest $request,$id){
        $this->AuthLogin();
        $data = $request->except('_token');
        $data['k_slug'] = Str::slug($request->k_name);
        $data['update_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        Keyword::find($id)->update($data);
        return redirect()->route(route:'get_backend.keyword.index');
    }
}
