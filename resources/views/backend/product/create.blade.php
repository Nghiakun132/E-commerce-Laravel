@extends('layout.app_backend')
@section('title', 'Thêm sản phẩm')
@section('content')
    <style>
        body {
            background-color: rgba(201, 28, 28, 0.15);
        }
        .heading {
            color: rgb(46, 12, 241);
            font-weight: bold;
            font-size: 44px;
            text-shadow: 0px 0px 3px #610d0d;
            text-align: center;
            animation: nhapnhay 0.8s linear infinite;
        }

        @keyframes nhapnhay {
            from {
                color: rgb(97, 247, 11);
            }

            to {
                color: rgb(9, 24, 241);
            }

        }

        label {
            font-size: 20px;
            font-weight: bold;
        }

        .mt {
            margin-top: 20px;
        }

    </style>
    <h2 class="heading mb-2">Thêm sản phẩm</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid" >
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="p-3">
                            <div class="form-group">
                                <label for="">Tên:</label>
                                <input type="text" class="form-control" placeholder="Tên" name="pro_name">
                                @if ($errors->first('pro_name'))
                                    <small class="form-text text-danger"> {{ $errors->first('pro_name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="pro_category_id" class="form-control">
                                    <option value="pro_category_id">
                                        ____Chọn danh mục____
                                    </option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->c_name }}</option>
                                    @endforeach
                                    @if ($errors->first('pro_category_id'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('pro_category_id') }}</small>
                                    @endif
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="pro_description" class="form-control " cols="30" rows="3"></textarea>
                                @if ($errors->first('pro_description'))
                                    <small class="form-text text-danger"> {{ $errors->first('pro_description') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <textarea name="pro_content" class="form-control " cols="30" rows="3"></textarea>
                                @if ($errors->first('pro_content'))
                                    <small class="form-text text-danger"> {{ $errors->first('pro_content') }}</small>
                                @endif
                            </div>
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" class="form-control" placeholder="Giá" name="pro_price">
                            @if ($errors->first('pro_price'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_price') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng nhập</label>
                            <input type="number" class="form-control" placeholder="Số lượng kho" name="pro_kho">
                            @if ($errors->first('pro_kho'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_kho') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="number" class="form-control" placeholder="Số lượng" name="pro_number">
                            @if ($errors->first('pro_number'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_number') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Đơn vị </label>
                            <select name="pro_unit" class="form-control">
                                <option value="Kg">Kg</option>
                                <option value="Lốc">Lốc</option>
                                <option value="Gói">Gói</option>
                                <option value="Chai">Chai</option>
                                <option value="Thùng">Thùng</option>
                                <option value="g">Gam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Giảm giá </label>
                            <input type="text" name="pro_sale" class="form-control">
                            @if ($errors->first('pro_sale'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_sale') }}</small>
                            @endif
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="pro_avatar">
                            <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                            @if ($errors->first('pro_avatar'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_avatar') }}</small>
                            @endif
                        </div>
            </div>
            <button type="submit" class="btn btn-primary mt" width="100%">Xử lý</button>
        </div>
            </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </form>

@stop
