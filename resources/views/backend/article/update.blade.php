@extends('layout.app_backend')
@section("title",'Cập nhật bài viết')
@section('content')
@foreach ($articles as $value )
@if($loop->last)
<form action="{{URL::to('admin/article/update-article',$value->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="p-3">

                    <div class="form-group">
                        <label for="">Tên:</label>
                        <input type="text" class="form-control" placeholder="Tên" name="a_name" value="{{$value->a_name}}">
                        @if($errors->first('a_name'))
                        <small class="form-text text-danger"> {{ $errors->first('a_name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Menu</label>
                        <select name="a_menu_id" class="form-control">
                            <option value="">
                                ____Chọn menu____
                            </option>
                            @foreach ($menus as $item)
                            <option value="{{$item->id}}">{{$item->mn_name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="a_description" class="form-control " cols="30" rows="3">{{$value->a_description}}</textarea>
                        @if($errors->first('a_description'))
                        <small class="form-text text-danger"> {{ $errors->first('a_description') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea name="a_content" class="form-control " cols="30" rows="10">{{$value->a_content}}</textarea>
                        @if($errors->first('a_content'))
                        <small class="form-text text-danger"> {{ $errors->first('a_content') }}</small>
                        @endif
                    </div>


                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card p-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="a_avatar">
                    <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Xử lý</button>
</form>
@endif
@endforeach
@stop
