@extends('layout.app_backend')
@section('content')
@section('title', 'Quản lý mã giảm giá')
<style>
    body{
        background-color:rgba(231, 190, 190, 0.34);
    }
    .heading {
        text-align: center;
        font-weight: bold;
        font-size: 44px;
        animation: nhapnhay 1.2s linear infinite;
    }

    @keyframes nhapnhay {
        from {
            color: red
        }

        to {
            color: green
        }

        from {
            transform:scale(0,0)
        }

        to {
            transform:scale(44px,44px)
        }
    }

</style>
<div class="container-fluid">
    <h2 class="heading">Mã giảm giá</h2>
    <a href="{{ URL::to('admin/coupon/add-coupon') }}"><button class="btn btn-success mb-2">Thêm mã giảm giá</button></a>
    <table class="table table-hover bg-info">
        <tr class="text-warning">
            <th>ID</th>
            <th>Tên</th>
            <th>Mã</th>
            <th>Số lượng</th>
            <th>Giảm</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
        @foreach ($coupon as $cp)
            <tr>
                <td>{{ $cp->cp_id }}</td>
                <td>{{ $cp->cp_name }}</td>
                <td>{{ $cp->cp_code }}</td>
                <td>{{ $cp->cp_qty }}</td>
                <td>{{ $cp->cp_condition * 100 . '%' }}</td>
                <td>{{ $cp->cp_time }}</td>
                <td>
                    <a href=""><i class="fas fa-edit text-warning"></i></a>
                    <a href=""><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@stop
