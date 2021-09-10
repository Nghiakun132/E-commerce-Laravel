@extends('layout.app_fronted')
@section('content')
@section('title', 'Thêm địa chỉ')

<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <h2>Thêm địa chỉ mới</h2>
                <form action="{{ URL::to('add') }}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address_new" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2">Thêm</button>
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

@stop
