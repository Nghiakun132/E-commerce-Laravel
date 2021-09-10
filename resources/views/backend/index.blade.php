@extends('layout.app_backend')
@section('title', 'Trang chủ')
@section('content')
    <style>
        .nhap {
            animation: myAnimation 1s linear infinite;
        }

        @keyframes myAnimation {
            from {
                color: red !important;
            }

            to {
                color: rgb(20, 221, 20) !important;
            }
        }

    </style>
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
            <h1 class="h3 mb-0 text-gray-800">Thống kê toàn cục</h1>
        </div>
        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng tiền</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $total = Session::get('total');
                                    echo number_format($total * 1000, 0, ',', '.') . 'đ';
                                    ?>
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span>Since last month</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x nhap text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Sản phẩm</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $product = Session::get('products');
                                    echo $product;
                                    ?>
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                    <span>Since last month</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Thành viên mới</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php
                                    $user = Session::get('users');
                                    echo $user;
                                    ?>
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                    <span>Since last month</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                    <span>Since yesterday</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Area Chart -->
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Số lượng </h6>
                        {{-- <div class="dropdown no-arrow">
                            <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Month <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Select Periode</div>
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Week</a>
                                <a class="dropdown-item active" href="#">Month</a>
                                <a class="dropdown-item" href="#">This Year</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        @foreach ($sp as $pd)
                                <div class="mb-3">
                                    <div class="medium text-gray-500">
                                        <span>{{ $pd->pro_name }}</span>
                                        <div class="medium float-right"><b>{{ $pd->pro_number }}
                                                Sản phẩm</b></div>
                                    </div>
                                    <div class="progress" style="height: 12px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-center">
                        <a class="m-0 small text-primary card-link" href="#">View More <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Invoice Example -->
            <div class="col-xl-8 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Đơn hàng</h6>
                        <a class="m-0 float-right btn btn-danger btn-sm" href="{{ route('get_backend.order.index') }}">Xem
                            thêm <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $value)
                                    <tr>
                                        <td><a
                                                href="{{ URL::to('admin/order/view-detail', $value->id) }}">{{ $value->id }}</a>
                                        </td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $address->address }}</td>
                                        <td>{{ $value->order_total . ' đ' }}</td>
                                        <td>
                                            @if ($value->order_status == 0)
                                                <a id="del" href="{{ URL::to('admin/order/change-status', $value->id) }}">
                                                    <span class="badge badge-success ac">Đang xử lý</span></a>
                                            @elseif ($value->order_status == 1)
                                                <a id="del"
                                                    href="{{ URL::to('admin/order/change-status', $value->id) }}"><span
                                                        class="badge badge-warning ac">Đã xác nhận</span></a>
                                            @elseif ($value->order_status == 2)
                                                <a id="del"
                                                    href="{{ URL::to('admin/order/change-status', $value->id) }}"><span
                                                        class="badge badge-danger ac">Đang vận chuyển</span></a>
                                            @elseif ($value->order_status == 3)
                                                <span class="badge badge-info ac">Đã giao hàng</span>
                                            @endif
                                        </td>
                                        <td><a href="{{ URL::to('admin/order/view-detail', $value->id) }}"
                                                class="btn btn-sm btn-primary">Xem chi tiết</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <img src="././././public/uploads/2021/09/04/2021-09-04__avatar.jpg" width="300px" height="300px"
                            alt="" class="img-thumbnail">
                    </div> Bùi Hữu Nghĩa B1809377
                </div>
            </div>
        </div>
    </div>


@stop
