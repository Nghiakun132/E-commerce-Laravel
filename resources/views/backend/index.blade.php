@extends('layout.app_backend')
@section('title', 'Trang chủ')
@section('content')
    <style>
        body {
            background-color: rgba(243, 193, 193, 0.671);
        }

        .nhap {
            color: red !important;
            animation: nhapnhay 1s linear infinite;
        }

        /* @keyframes myAnimation {
                            from {
                                color: red !important;
                            }

                            to {
                                color: rgb(20, 221, 20) !important;
                            }
                        } */
        @keyframes nhapnhay {
            from {
                color: rgb(46, 12, 241);
            }

            to {
                color: rgb(9, 238, 28);
            }
        }

    </style>
    <div class="container-fluid" id="container-wrapper">
        <div class="row mb-2">
            <div class="col-lg-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                    <h1 class="h3 mb-0 text-gray-800">Thống kê toàn cục</h1>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng doanh thu </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $total = Session::get('total');
                                    echo number_format($total * 1000, 0, ',', '.') . 'đ';
                                    ?>
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <?php
                                        $doanhthu=$total*1000 -$import;
                                    ?>
                                    @if ($doanhthu > 0)
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i><?php echo $doanhthu; ?></span>
                                    @else
                                    <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i><?php echo $doanhthu.'đ'; ?> </span>
                                    @endif
                                    {{-- <span>Since last month</span> --}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x nhap text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng tiền nhập hàng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($import) . 'đ' }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 1.10%</span>
                                    {{-- <span>Since yesterday</span> --}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Sản phẩm đã bán</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $products_sell }}
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                    {{-- <span>Since last month</span> --}}
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
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Khách hàng</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 nhap">
                                    <?php
                                    $user = Session::get('users');
                                    echo $user;
                                    ?>
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                    {{-- <span>Since last month</span> --}}
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
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Bình luận</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $comment }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 1.10%</span>
                                    {{-- <span>Since yesterday</span> --}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Bình luận</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $comment }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 1.10%</span>
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
                    </div>
                    <div class="card-body">
                        @foreach ($sp as $pd)
                            <div class="mb-3">
                                <div class="medium text-gray-500">
                                    <span>{{ $pd->pro_name }}</span>
                                    <div class="medium float-right"><b>Đã bán {{ $pd->pro_kho - $pd->pro_number }}
                                            / {{ $pd->pro_kho }}
                                            Sản phẩm</b>
                                        </div>
                                </div>
                                <?php
                                $bg = ['bg-info', 'bg-primary', 'bg-secondary', 'bg-danger', 'bg-success', 'bg-warning', 'bg-dark'];
                                $adu = $bg[rand(0, count($bg) - 1)];
                                ?>
                                <?php
                                $pt = $pd->pro_kho - $pd->pro_number;
                                $ptcl = $pt / $pd->pro_kho*100;
                                ?>
                                <div class="progress" style="height: 18px;">
                                    <div class="progress-bar <?php echo $adu; ?> progress-bar-striped progress-bar-animated"
                                        role="progressbar" style="width: <?php echo 100 - $ptcl . '%'; ?> " aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" title="Còn lại <?php echo $pd->pro_number?> sản phẩm"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="card-footer text-center">
                        <a class="m-0 small text-primary card-link" href="#">View More <i
                                class="fas fa-chevron-right"></i></a>
                    </div> --}}
                </div>

            </div>
            <!-- Invoice Example -->
            <div class="col-xl-8 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Đơn hàng gần nhất</h6>
                        <a class="m-0 float-right btn btn-danger btn-sm" href="{{ route('get_backend.order.index') }}">Xem
                            thêm <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
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
                                        <td>{{ $value->pk_address }}</td>
                                        <td>{{ $value->pd_total * 1000 . 'đ' }}</td>
                                        <td>
                                            @if ($value->order_status == 0)
                                                <a id="del"
                                                    href="{{ URL::to('admin/order/change-status', $value->id) }}">
                                                    <span class="badge badge-success ac">Đang xử lý</span></a>
                                            @elseif ($value->order_status == 1)
                                                <a id="del"
                                                    href="{{ URL::to('admin/order/change-status', $value->id) }}"><span
                                                        class="badge badge-warning ac">Đã xác nhận</span></a>
                                            @elseif ($value->order_status == 2)
                                                <a id="del"
                                                    href="{{ URL::to('admin/order/change-status', $value->id) }}"><span
                                                        class="badge badge-primary ac">Đang vận chuyển</span></a>
                                            @elseif ($value->order_status == 3)
                                                <span class="badge badge-info ac">Đã giao hàng</span>
                                            @else
                                                <span class="badge badge-danger ac">Đã hủy</span>
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
                {{-- <div class="card mt-2">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-warning">Khách hàng mua nhiều nhất</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tên</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($top as $value9)
                                    <tr>
                                        <td>{{ $value9->name }}</td>
                                        <td>{{ $value9->address }}</td>
                                        <td>{{ ($value9->pd_total) *1000 . 'đ' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div> --}}
            </div>
        </div>
    </div>




@stop
