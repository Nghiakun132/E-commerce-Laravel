@extends('layout.app_backend')
@section("title",'Cập nhật Menu')
@section('content')
    <h3>Danh sach menu</h3>
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
               @include('backend.menu.form',['route' => route('get_backend.menu.update',$menu->id)])
            </div>
        </div>
    </div>
@stop
