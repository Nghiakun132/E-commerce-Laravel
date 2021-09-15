@extends('layout.app_backend')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <style>
        .heading {
            color: rgb(46, 12, 241);
            font-weight: bold;
            font-size: 44px;
            text-shadow: 0px 0px 3px #610d0d;
            text-align: center;
            animation: nhapnhay 0.8s linear infinite;
        }

        @keyframes nhapnhay {
            from {
                color: rgb(97, 247, 11);
            }

            to {
                color: rgb(9, 24, 241);
            }

        }
        button{
            outline: none;
            border: none;
        }
        .up:hover{
            color:red !important;
        }
        .down:hover{
            color:green !important;
        }
    </style>
    <h2 class="heading">Danh sách sản phẩm</h2>
    {{-- <a href="{{URL::to('admin/product/add-img')}}" class="btn btn-xs btn-success ml-2">Thêm hình ảnh sản
                phẩm</a></h3> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('get_backend.product.create') }}" class="btn btn-xs btn-success mb-2">Thêm sản
                    phẩm</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Giá gốc</th>
                            <th>Giá đã giảm</th>
                            <th>Số lượng nhập</th>
                            <th>Số lượng còn lại</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->pro_name }}</td>
                                <td>
                                    <img src="{{ url_file($item->pro_avatar) }}" class="img-thumbnail" width="60px"
                                        height="60px" alt="">
                                </td>
                                <td>{{number_format(($item->pro_price),0,',','.').'đ'}}</td>
                                <td><span>{{ number_format($item->pro_price - $item->pro_price * $item->pro_sale, 0, ',', '.') . ' ' . 'đ' }}</span>
                                </td>
                                <td>{{ $item->pro_kho }}</td>
                                <td>{{ $item->pro_number }}</td>
                                <td>
                                    @if ($item->pro_status == 0)
                                        <a href="{{ URL::to('admin/product/change-status', $item->id) }}"><i
                                                class="fa fa-thumbs-up text-success ml-2 up" style="font-size:30px"
                                                aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{ URL::to('admin/product/change-status', $item->id) }}"><i
                                                class="fa fa-thumbs-down text-danger ml-2 down" style="font-size:30px"
                                                aria-hidden="true"></i></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('get_backend.product.delete', $item->id) }}"
                                        class="btn btn-danger">Delete</a>
                                    <a href="{{ route('get_backend.product.update', $item->id) }}"
                                        class="btn btn-primary">Update</a>
                                    <a href="{{ route('get_backend.product.add', $item->id) }}"
                                        class="btn btn-primary">Thêm ảnh</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
