@extends('layout.app_backend')
@section('title', 'Thêm bài viết')
@section('content')
    <style>
    body {
        background-image: url('../../../public/img/a.jpg');
    }
        .heading {
        color: rgb(46, 12, 241);
        font-weight: bold;
        font-size: 44px;
        text-shadow: 0px 0px 3px #610d0d;
        text-align: center;
        animation:nhapnhay 0.8s linear infinite;
    }
        @keyframes nhapnhay{
            from { color: rgb(46, 12, 241); }
            to { color: rgb(9, 238, 28); }
        }

    </style>
            {{-- background-image: url('.././public/img/breadcrumb.jpg'); --}}
            <h2 class="heading" >Thêm bài viết</h2>
    <form action="{{ URL::to('admin/article/add-article') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="p-4">
                        <div class="form-group">
                            <label for="">Tên:</label>
                            <input type="text" class="form-control" name="a_name">
                            @if ($errors->first('a_name'))
                                <small class="form-text text-danger"> {{ $errors->first('a_name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Menu</label>
                            <select name="a_menu_id" class="form-control">
                                <option value="a_menu_id">
                                    ____Chọn menu____
                                </option>
                                @foreach ($menus as $item)
                                    <option value="{{ $item->id }}">{{ $item->mn_name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="a_description" class="form-control " cols="30" rows="3"></textarea>
                            @if ($errors->first('a_description'))
                                <small class="form-text text-danger"> {{ $errors->first('a_description') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="a_content" class="form-control " cols="30" rows="3"></textarea>
                            @if ($errors->first('a_content'))
                                <small class="form-text text-danger"> {{ $errors->first('a_content') }}</small>
                            @endif
                        </div>
                        <div class="p-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="a_avatar">
                                <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                            </div>
                        </div>
        <button type="submit" class="btn btn-primary mt-2">Xử lý</button></div>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </form>
@stop
