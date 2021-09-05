@extends('layout.app_backend')
@section("titles",'Cập nhật danh mục')
@section('content')
    <h3>Danh sách danh mục</h3>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                    @include('backend.category.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card p-3">
                <h4>Thêm mới || Cập nhật</h4>
               @include('backend.category.form',['route' => route('get_backend.category.update',$category->id)])
            </div>
        </div>
    </div>
@stop
