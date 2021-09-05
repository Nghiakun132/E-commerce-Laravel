
@extends('layout.app_backend')
@section("titles",'Danh sách từ khóa')
@section('content')
    <h3>Danh sach từ khóa</h3>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                   @include('backend.keyword.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card p-3">
                <h4>Thêm mới || Cập nhật</h4>
               @include('backend.keyword.form',['route' => route('get_backend.keyword.store')])
            </div>
        </div>
    </div>
@stop

