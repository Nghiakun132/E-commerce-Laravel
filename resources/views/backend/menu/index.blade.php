
@extends('layout.app_backend')
@section("title",'Danh sách menu')
@section('content')
    <h3>Danh sách menu</h3>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                   @include('backend.menu.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card p-3">
                <h4>Thêm mới || Cập nhật</h4>
               @include('backend.menu.form',['route' => route('get_backend.menu.store')])
            </div>
        </div>
    </div>
@stop

