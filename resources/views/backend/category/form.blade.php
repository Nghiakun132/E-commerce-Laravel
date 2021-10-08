<form  action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="">Name:</label>
    <input type="text" class="form-control"  name="c_name" value="{{old('c_name',$category->c_name ?? '')}}">
    @if($errors->first('c_name'))
    <small class="form-text text-danger"> {{ $errors->first('c_name') }}</small>
    @endif
</div>
<div class="custom-file border-bottom  ">
    <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="c_avatar">
    <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
    {{-- @if ($errors->first('pro_avatar'))
        <small class="form-text text-danger"> {{ $errors->first('pro_avatar') }}</small>
    @endif --}}
</div>

<button type="submit" class="btn btn-danger mt-2">Xử lý</button>
</form>

