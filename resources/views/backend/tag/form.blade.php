<form  action="{{ $route }}" method="POST">
    @csrf
<div class="form-group">
    <label for="">Name:</label>
    <input type="text" class="form-control" placeholder="Name" name="t_name" value="{{old('t_name',$tag->t_name ?? '')}}">
    @if($errors->first('t_name'))
    <small class="form-text text-danger"> {{ $errors->first('t_name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Xử lý</button>
</form>
