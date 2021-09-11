@extends('layout.app_backend')
@section('title', 'Thêm ảnh sản phẩm')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 card">
                <form action="{{URL::to('admin/product/add-image')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Danh mục</label>
                            <select name="product_slug" id="" class="form-control">
                                <option value="{{$product->pro_slug}}">{{$product->pro_name}}</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="pro_avatar">
                            <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                            <button type="submit" class="btn btn-primary mt-2">Xử lý</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@stop
