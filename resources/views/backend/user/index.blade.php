@extends('layout.app_backend')
@section('content')
@section('title', 'Danh sách thành viên')
<style>
    body {
        background-color: rgba(217, 182, 228, 0.432);
    }

    .heading {
        font-size: 44px;
        text-shadow: 1px 1px 0px rgb(155, 229, 155);
        animation: nhapnhay 1.2s linear infinite;
        text-align: center;
    }

    @keyframes nhapnhay {
        from {
            color: red;
        }

        to {
            color: green;
        }
    }

    .status:hover {
        color: red !important;
    }

    .delete:hover i {
        color: red !important;
    }

    .view:hover i {
        color: green !important;
    }
    thead{
        color: rgb(225, 248, 14);
    }
</style>

<h2 class="heading">Danh sách khách hàng</h2>
<div class="table-responsive-xl">
    <table class="table table-hover table-secondary">
        <thead class="bg-success">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>
        </thead>
        @if ($countUsers > 0)
            @foreach ($user as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>
                        @if ($value->status == 0)
                            <a title="Tài khoản hoạt động"
                                href="{{ URL::to('admin/user/change-status-user', $value->id) }}"><i
                                    class="fa fa-thumbs-up ml-2 text-success status" style="font-size:23px"
                                    aria-hidden="true"></i></a>
                        @else
                            <a title="Tài khoản bị khóa"
                                href="{{ URL::to('admin/user/change-status-user', $value->id) }}"><i
                                    class="fa fa-thumbs-down text-danger status" style="font-size:23px"
                                    aria-hidden="true"></i></a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ URL::to('admin/user/detail/' . $value->id) }}" class="view"><i
                                style="font-size:23px;margin:4px" class="fa fa-address-book mr-2 text-success"
                                aria-hidden="true"></i></a>
                        <a href="{{ URL::to('admin/user/delete/' . $value->id) }}"
                            onclick="return confirm('Bạn có chắc muốn xóa không')" class="delete"><i
                                style="font-size:23px;margin:4px" class="fa fa-trash text-danger "
                                aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <h3 class="text-danger text-center">
                    Không có khách hàng đăng ký
                </h3>
            </tr>
        @endif
    </table>
</div>
@stop
