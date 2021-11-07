@extends('layout.app_backend')
@section('content')
@section('title','Trang chủ')
    <main>
        <?php
        $doanhthu = $total * 1000 - $import;
        ?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-header">Doanh thu</div>
                        <div class="card-body">{{number_format($total* 1000,0,',', '.') . 'đ'}}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white">
                                @if ($doanhthu > 0)
                                    <i class="fas fa-arrow-up text-success"></i>
                                    <span>{{ number_format($doanhthu, 0, '.', '.') }} đ</span>
                                @else
                                    <i class="fas fa-arrow-down text-danger"></i>
                                    <span>{{ number_format($doanhthu, 0, '.', '.') }} đ</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-header">Khách hàng</div>
                        <div class="card-body">{{ $user }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-warning">Khách hàng</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-header">Sản phẩm đã bán</div>
                        <div class="card-body">{{ $products_sell }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white">Sản phẩm đã bán</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-header">Tổng tiền nhập hàng</div>
                        <div class="card-body">{{ number_format($import, 0, ',', '.') . 'đ' }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white">Tổng tiền nhập hàng</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Số lượng </h6>
                        </div>

                        <div class="card-body">

                            @foreach ($sp as $pd)
                                <?php
                                $text = ['text-info', 'text-primary', 'text-secondary', 'text-danger', 'text-success', 'text-warning', 'text-dark'];
                                $text2 = $text[rand(0, count($text) - 1)];
                                ?>
                                <div class="mb-3">
                                    <div class="medium text-gray-500">
                                        <div class="medium float-right">
                                            <span style="font-weight: bold"
                                                class="{{ $text2 }}">{{ $pd->pro_name }}</span>
                                            &nbsp;&nbsp;&nbsp; &nbsp;
                                            <b>Đã bán {{ $pd->pro_kho - $pd->pro_number }}
                                                / {{ $pd->pro_kho }}
                                                Sản phẩm</b>
                                        </div>
                                    </div>
                                    <?php
                                    $bg = ['bg-info', 'bg-primary', 'bg-secondary', 'bg-danger', 'bg-success', 'bg-warning', 'bg-dark'];
                                    $adu = $bg[rand(0, count($bg) - 1)];
                                    $pt = $pd->pro_kho - $pd->pro_number;
                                    $ptcl = ($pt / $pd->pro_kho) * 100;
                                    ?>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar <?php echo $adu; ?> progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: <?php echo 100 - $ptcl . '%'; ?> " aria-valuenow="80"
                                            aria-valuemin="0" aria-valuemax="100"
                                            title="Còn lại <?php echo $pd->pro_number; ?> sản phẩm">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Đơn hàng
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
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
                                            <a id="del" href="{{ URL::to('admin/order/change-status', $value->id) }}">
                                                <span class="badge bg-success ac">Đang xử lý</span></a>
                                        @elseif ($value->order_status == 1)
                                            <a id="del"
                                                href="{{ URL::to('admin/order/change-status', $value->id) }}"><span
                                                    class="badge bg-warning ac">Đã xác nhận</span></a>
                                        @elseif ($value->order_status == 2)
                                            <a id="del"
                                                href="{{ URL::to('admin/order/change-status', $value->id) }}"><span
                                                    class="badge bg-primary ac">Đang vận chuyển</span></a>
                                        @elseif ($value->order_status == 3)
                                            <span class="badge bg-info ac">Đã giao hàng</span>
                                        @else
                                            <span class="badge bg-danger ac">Đã hủy</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ URL::to('admin/order/view-detail', $value->id) }}"
                                            class="btn btn-sm btn-primary">Xem chi tiết</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@stop
