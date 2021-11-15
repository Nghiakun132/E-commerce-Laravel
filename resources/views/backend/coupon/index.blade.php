@extends('layout.app_backend')
@section('content')
@section('title', 'Quản lý mã giảm giá')
<style>
    body {
        background-color: rgba(231, 190, 190, 0.34);
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
            transform: scale(0, 0)
        }

        to {
            transform: scale(44px, 44px)
        }
    }
</style>
<div class="container-fluid">
    <h2 class="heading">Mã giảm giá</h2>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Mã giảm giá
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead class="table-success">
                    <tr class="text-danger">
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Tên chủ sở hữu</th>
                        <th>Giảm</th>
                        <th>Hạn dùng</th>
                        <th>Trạng thái</th>
                        <th>Thời gian tạo</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-danger">
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Tên chủ sở hữu</th>
                        <th>Giảm</th>
                        <th>Hạn dùng</th>
                        <th>Trạng thái</th>
                        <th>Thời gian tạo</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($coupon as $cp)
                        <tr>
                            <td>{{ $cp->cp_id }}</td>
                            <td>{{ $cp->cp_code }}</td>
                            <td>{{ $cp->name }}</td>
                            <td>{{ $cp->cp_value * 100 . '%' }}</td>
                            <td>{{ $cp->cp_expiry }}</td>
                            <td>
                                @if ($cp->cp_status == 0)
                                    Chưa sử dụng
                                @else
                                    Đã sử dụng
                                @endif
                            </td>
                            <td>{{ $cp->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
