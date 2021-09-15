@extends('layout.app_backend')
@section("title",'Cập nhật sản phẩm')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="p-3">
                    <div class="form-group">
                        <label for="">Tên:</label>
                        <input type="text" class="form-control" placeholder="Tên" name="pro_name"
                         value="{{old('pro_name',$product->pro_name ?? '')}}">
                        @if($errors->first('pro_name'))
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
                            <option value="{{$item->id}}" {{old('pro_category_id',$product->pro_category_id ?? 0)==$item->id ?"selected":""}}>{{$item->c_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="pro_description" class="form-control " cols="30" rows="3">{{old('pro_description',$product->pro_description ?? '')}}</textarea>
                        @if($errors->first('pro_description'))
                        <small class="form-text text-danger"> {{ $errors->first('pro_description') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea name="pro_content" class="form-control " cols="30" rows="3">{{old('pro_content',$product->pro_content ?? '')}}</textarea>
                        @if($errors->first('pro_content'))
                        <small class="form-text text-danger"> {{ $errors->first('pro_content') }}</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card p-3">
                <div class="form-group">
                    <label for="">Giá</label>
                    <input type="text" class="form-control" placeholder="Giá" name="pro_price" value="{{old('pro_price',$product->pro_price ?? 0)}}">
                    @if($errors->first('pro_price'))
                    <small class="form-text text-danger"> {{ $errors->first('pro_price') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Số lượng kho</label>
                    <input type="number" class="form-control" placeholder="Số lượng" name="pro_kho" value="{{old('pro_number',$product->pro_kho ?? 0)}}">
                </div>
                <div class="form-group">
                    <label for="">Số lượng hiện tại</label>
                    <input type="number" class="form-control" placeholder="Số lượng" name="pro_number" value="{{old('pro_number',$product->pro_number ?? 0)}}">
                    @if($errors->first('pro_number'))
                    <small class="form-text text-danger"> {{ $errors->first('pro_number') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Đơn vị </label>
                    <select name="pro_unit" >
                        <option value="Kg">Kg</option>
                        <option value="Lốc">Lốc</option>
                        <option value="Gói">Gói</option>
                        <option value="Chai">Chai</option>
                        <option value="Thùng">Thùng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giảm giá </label>
                    <input type="text" name="pro_sale" value="{{$product->pro_sale}}">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="pro_avatar">
                    <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Xử lý</button>
</form>

@stop
