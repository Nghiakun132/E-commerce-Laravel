@extends('layout.app_backend')
@section("title",'Cập nhật danh mục')
@section('content')
<style>
    body {
        background-image: url('../../../public/img/a.jpg');
    }
    .heading {
        color: rgb(46, 12, 241);
        font-weight: bold;
        font-size: 44px;
        text-shadow: 0px 0px 3px #610d0d;
        text-align: center;
        animation: nhapnhay 1.8s linear infinite;
    }

    @keyframes nhapnhay {
        from {
            color: rgb(46, 12, 241);
        }

        to {
            color: rgb(9, 238, 28);
        }
    }
    @keyframes nhapnhay1 {
            from {
                background-color: rgba(137, 255, 2, 0.76);
            }

            to {
                background-color: rgb(255, 0, 0);
            }
        }
        @keyframes nhapnhay2 {
            from {
                background-color: rgb(247, 11, 11);
            }

            to {
                background-color: rgb(245, 208, 2);
            }
        }
        .update{
            outline: none;
            border: none;
            animation: nhapnhay1 1.8s linear infinite;
        }
        .delete{
            outline: none;
            border: none;
            animation: nhapnhay2 1.8s linear infinite;

        }
    </style>
    <h3 class="heading">Danh sách danh mục</h3>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                    @include('backend.category.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5 ">
            <div class="card p-3">
                <h4>Thêm mới || Cập nhật</h4>
               @include('backend.category.form',['route' => route('get_backend.category.update',$category->id)])
            </div>
        </div>
    </div>
@stop
