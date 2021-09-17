@extends('layout.app_backend')
@section('content')
@section('title', 'Danh sách thành viên')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 card">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số tiền đã mua</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            <ul style="list-style:none">
                                @foreach ($user_address as $value)
                                    <li>{{ $value->address }}
                                        <span>
                                            @if ($value->status == 1)
                                                <i class="fa fa-check text-success" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-check text-danger" aria-hidden="true"></i>
                                            @endif
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $product_bought * 1000 . 'đ' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>



@stop
