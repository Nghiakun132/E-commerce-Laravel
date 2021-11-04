@extends('layout.app_backend')
@section("title",'Cập nhật danh mục')
@section('content')
    <div class="container-fluid">
        <h3 class="heading">Danh sách danh mục</h3>
        <div class="card">
        <form class="m-3"  action="{{URL::to('admin/category/update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mb-2">
            <label for="">Name:</label>
            <input type="text" class="form-control"  name="c_name" value="{{$category->c_name}}">
            @if($errors->first('c_name'))
            <small class="form-text text-danger"> {{ $errors->first('c_name') }}</small>
            @endif
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Chọn ảnh từ máy tính</label>
            <input class="form-control" type="file" id="formFile" name="c_avatar">
          </div>
        <button type="submit" class="btn btn-danger mt-2">Xử lý</button>
        </form>
    </div>
</div>
@stop
