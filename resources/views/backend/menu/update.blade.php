@extends('layout.app_backend')
@section("title",'Cập nhật Menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Thay đổi</h3>
            <div class="card">
                <form class="m-4" action="{{ URL::to('/admin/menu/update',$menu->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" placeholder="Name" name="mn_name"
                            value="{{ old('mn_name', $menu->mn_name ?? '') }}">
                        @if ($errors->first('mn_name'))
                            <small class="form-text text-danger"> {{ $errors->first('mn_name') }}</small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Xử lý</button>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@stop
