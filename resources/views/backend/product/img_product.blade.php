@extends('layout.app_backend')
@section('title', 'Thêm ảnh sản phẩm')
@section('content')
<style>
    .heading {
        font-size: 35px;
        font-weight: bold;
        margin-left: 20px;
        margin-top: 20px;
    }
</style>
<h3 class="heading">Thêm ảnh cho sản phẩm</h3>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                {{-- <a href="{{ URL::to('admin/product') }}"><span class="badge badge-danger display-2">Quay lại</span></a> --}}
            </div>
            <div class="col-lg-6 ">
                <div class="card mt-3">
                    <form action="{{ URL::to('admin/product/add-image') }}" method="POST" enctype="multipart/form-data" class="m-3">
                        @csrf
                        <div class="mt-3">
                            <label for="">Sản phẩm</label>
                            <select name="product_slug" id="" class="form-control">
                                <option value="{{ $product->pro_slug }}">{{ $product->pro_name }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for=""></label>
                            <div class="mb-3">
                                <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                                <input type="file" class="form-control" accept="image/*" id="customFile"
                                    name="pro_avatar">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Xử lý</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
@stop
