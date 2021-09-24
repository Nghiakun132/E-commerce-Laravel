
@extends('layout.app_backend')
@section("title",'Danh sách menu')
@section('content')
<style>
    body {
        background-color: rgba(202, 144, 199, 0.329);
    }
    @keyframes nhapnhay{
        from {
            color: red;
        }to {
            color: rgb(24, 236, 52);
        }
    }
    .heading{
        font-size: 44px;
        text-align: center;
        text-shadow: 2px 0px 0px #0c0;
        animation: nhapnhay 1.2s linear infinite;
    }
    .bg{
        background-color: rgba(170, 143, 143, 0.527);
    }
</style>
    <h2 class="heading">Danh sách menu</h2>
    <div class="row">
        <div class="col-sm-7">
                <div class="p-3 bg card">
                   @include('backend.menu.list')
                </div>
        </div>
        <div class="col-sm-5">
            <div class="card p-3 bg">
                <h3 class="text-success">Thêm mới || Cập nhật</h3>
               @include('backend.menu.form',['route' => route('get_backend.menu.store')])
            </div>
        </div>
    </div>
@stop

