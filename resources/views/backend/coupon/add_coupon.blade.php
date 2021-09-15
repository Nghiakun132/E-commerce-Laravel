@extends('layout.app_backend')
@section('content')

<form action="{{ URL::to('admin/coupon/add') }}" method="POST">
    @csrf
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="p-3">
                    <div class="form-group">
                        <label for="">Tên mã giảm giá</label>
                        <input type="text" class="form-control" name="cp_name">
                    </div>
                    <div class="form-group">
                        <label for="">Mã giảm giá</label>
                        <input type="text" class="form-control" name="cp_code">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control" name="cp_qty">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm</label>
                        <input type="text" class="form-control" name="cp_condition">
                    </div>

    <button type="submit" class="btn btn-primary mt-2">Xử lý</button></div>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</form>











@stop
