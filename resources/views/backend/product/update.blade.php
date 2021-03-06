@extends('layout.app_backend')
@section('title', 'Cập nhật sản phẩm')
@section('content')
    <style>
        body {
            background-color: rgba(201, 28, 28, 0.15);
        }
        label {
            font-size: 20px;
            color: rgb(247, 11, 11);
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 card">
                <form action="{{URL::to('admin/product/update-product',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-2">
                        <label for="">Tên:</label>
                        <input type="text" class="form-control" placeholder="Tên" name="pro_name"
                            value="{{ old('pro_name', $product->pro_name ?? '') }}">
                        @if ($errors->first('pro_name'))
                            <small class="form-text text-danger"> {{ $errors->first('pro_name') }}</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Danh mục</label>
                        <select name="pro_category_id" class="form-control">
                            <option value="pro_category_id">
                                ____Chọn danh mục____
                            </option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('pro_category_id', $product->pro_category_id ?? 0) == $item->id ? 'selected' : '' }}>
                                    {{ $item->c_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Mô tả</label>
                        <textarea name="pro_description" class="form-control " cols="30"
                            rows="1">{{ old('pro_description', $product->pro_description ?? '') }}</textarea>
                        @if ($errors->first('pro_description'))
                            <small class="form-text text-danger"> {{ $errors->first('pro_description') }}</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Nội dung</label>
                        <textarea name="pro_content" class="form-control " cols="30"
                            rows="1">{{ old('pro_content', $product->pro_content ?? '') }}</textarea>
                        @if ($errors->first('pro_content'))
                            <small class="form-text text-danger"> {{ $errors->first('pro_content') }}</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Giá</label>
                        <input type="text" class="form-control" placeholder="Giá" name="pro_price"
                            value="{{ old('pro_price', $product->pro_price ?? 0) }}">
                        @if ($errors->first('pro_price'))
                            <small class="form-text text-danger"> {{ $errors->first('pro_price') }}</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Số lượng kho</label>
                        <input type="number" class="form-control" placeholder="Số lượng" name="pro_kho"
                            value="{{ old('pro_number', $product->pro_kho ?? 0) }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="">Số lượng hiện tại</label>
                        <input type="number" class="form-control" placeholder="Số lượng" name="pro_number"
                            value="{{ old('pro_number', $product->pro_number ?? 0) }}">
                        @if ($errors->first('pro_number'))
                            <small class="form-text text-danger"> {{ $errors->first('pro_number') }}</small>
                        @endif
                    </div> --}}
                    <div class="mb-3">
                        <label for="">Giảm giá </label>
                        <input type="text" class="form-control" name="pro_sale" value="{{ $product->pro_sale }}">
                    </div>
                    <div class="mb-3">
                        <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                        <input type="file" class="form-control" accept="image/*" id="customFile" name="pro_avatar">
                    </div>
                    <button type="submit" class="btn btn-primary m-2">Xử lý</button>
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>


@stop
