<form  action="{{ $route }}" method="POST">
    @csrf
<div class="form-group">
    <label for="">Name:</label>
    <input type="text" class="form-control" placeholder="Name" name="k_name" value="{{old('k_name',$keyword->k_name ?? '')}}">
    @if($errors->first('k_name'))
    <small class="form-text text-danger"> {{ $errors->first('k_name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Xử lý</button>
</form>

