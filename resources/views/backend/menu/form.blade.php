<form  action="{{ $route }}" method="POST">
    @csrf
<div class="form-group">
    <label for="">Name:</label>
    <input type="text" class="form-control" placeholder="Name" name="mn_name" value="{{old('mn_name',$menu->mn_name ?? '')}}">
    @if($errors->first('mn_name'))
    <small class="form-text text-danger"> {{ $errors->first('mn_name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Xử lý</button>
</form>
