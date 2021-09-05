@extends('layout.app_backend')
@section("title",'Cập nhật Tag')
@section('content')
    <h3>Danh sach tag</h3>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                @include('backend.tag.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card p-3">
                <h4>Thêm mới || Cập nhật</h4>
               @include('backend.tag.form',['route' => route('get_backend.tag.update',$tag->id)])
            </div>
        </div>
    </div>
@stop
