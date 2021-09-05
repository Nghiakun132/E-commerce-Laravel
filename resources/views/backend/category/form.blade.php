<form  action="{{ $route }}" method="POST">
    @csrf
<div class="form-group">
    <label for="">Name:</label>
    <input type="text" class="form-control" placeholder="Name" name="c_name" value="{{old('c_name',$category->c_name ?? '')}}">
    @if($errors->first('c_name'))
    <small class="form-text text-danger"> {{ $errors->first('c_name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Xử lý</button>
</form>

