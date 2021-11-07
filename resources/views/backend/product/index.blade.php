@extends('layout.app_backend')
@section('title', 'Danh sách sản phẩm')
@section('content')
    {{-- <style>
        /* body {
                    background-color: rgba(201, 28, 28, 0.15);
                } */

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

        button {
            outline: none;
            border: none;
        }

        .up:hover {
            color: red !important;
        }

        .down:hover {
            color: green !important;
        }

        .input_form {
            background-color: rgba(176, 255, 102, 0.4);
        }

        .input_form input[type="text"] {
            color: red !important;
        }

        .delete:hover i {
            color: #f10000e8 !important;
        }

        .update:hover i {
            color: #35ff0de8 !important;
        }

        .add:hover i {
            color: #d408fde8;
        }

    </style> --}}
    <h2 class="heading">Danh sách sản phẩm</h2>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Sản phẩm
                <a href="" data-bs-toggle="modal" data-bs-target="#myModal"><button class="btn btn-primary">Thêm</button></a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-success">
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
                    <tfoot>
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
                    </tfoot>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->pro_name }}</td>
                                <td>
                                    <img src="{{ url_file($item->pro_avatar) }}" class="img-thumbnail" width="60px"
                                        height="60px" alt="">
                                </td>
                                <td>{{ number_format($item->pro_price, 0, ',', '.') . 'đ' }}</td>
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
                                    <a onclick="return confirm('Bạn có chắc muốn xóa không')"
                                        href="{{ route('get_backend.product.delete', $item->id) }}"
                                        class="delete"><i style="font-size:23px;margin:4px"
                                            class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                    <a href="{{ route('get_backend.product.update', $item->id) }}"
                                        class="update"><i style="font-size:23px;margin:4px"
                                            class="fas fa-edit text-success"></i></a>
                                    <a href="{{ route('get_backend.product.add', $item->id) }}" class="add"><i
                                            style="font-size:23px;margin:4px" class="fas fa-images"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('get_backend.product.create') }}" data-toggle="modal" data-target="#myModal"
                    class="btn btn-xs btn-success mb-2">Thêm sản
                    phẩm</a>
                <div class="input_form">
                    <input class="form-control mb-2" id="myInput" type="text" placeholder="Tìm nhanh..">
                </div>
                <div class="table-responsive-xl">
                    <table class="table table-hover table-secondary">
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
                        <tbody id="myTable">
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->pro_name }}</td>
                                    <td>
                                        <img src="{{ url_file($item->pro_avatar) }}" class="img-thumbnail" width="60px"
                                            height="60px" alt="">
                                    </td>
                                    <td>{{ number_format($item->pro_price, 0, ',', '.') . 'đ' }}</td>
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
                                        <a onclick="return confirm('Bạn có chắc muốn xóa không')"
                                            href="{{ route('get_backend.product.delete', $item->id) }}"
                                            class="delete"><i style="font-size:23px;margin:4px"
                                                class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                        <a href="{{ route('get_backend.product.update', $item->id) }}"
                                            class="update"><i style="font-size:23px;margin:4px"
                                                class="fas fa-edit text-success"></i></a>
                                        <a href="{{ route('get_backend.product.add', $item->id) }}"
                                            class="add"><i style="font-size:23px;margin:4px"
                                                class="fas fa-images"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Tên:</label>
                            <input type="text" class="form-control" name="pro_name">
                            @if ($errors->first('pro_name'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_name') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Danh mục</label>
                            <select name="pro_category_id" class="form-select">
                                <option value="pro_category_id">
                                    ____Chọn danh mục____
                                </option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->c_name }}</option>
                                @endforeach
                                @if ($errors->first('pro_category_id'))
                                    <small class="form-text text-danger">
                                        {{ $errors->first('pro_category_id') }}</small>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Mô tả</label>
                            <textarea name="pro_description" class="form-control " cols="30" rows="1"></textarea>
                            @if ($errors->first('pro_description'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_description') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Nội dung</label>
                            <textarea name="pro_content" class="form-control " cols="30" rows="1"></textarea>
                            @if ($errors->first('pro_content'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_content') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Giá</label>
                            <input type="text" class="form-control" name="pro_price">
                            @if ($errors->first('pro_price'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_price') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Số lượng nhập</label>
                            <input type="number" class="form-control" name="pro_kho">
                            @if ($errors->first('pro_kho'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_kho') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Đơn vị </label>
                            <select name="pro_unit" class="form-select">
                                <option value="Kg">Kg</option>
                                <option value="Lốc">Lốc</option>
                                <option value="Gói">Gói</option>
                                <option value="Chai">Chai</option>
                                <option value="Thùng">Thùng</option>
                                <option value="g">Gam</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Giảm giá </label>
                            <input type="text" name="pro_sale" class="form-control">
                            @if ($errors->first('pro_sale'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_sale') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Chọn ảnh từ máy tính</label>
                            <input class="form-control" type="file" accept="image/*" id="formFile" name="pro_avatar">
                            @if ($errors->first('pro_avatar'))
                                <small class="form-text text-danger"> {{ $errors->first('pro_avatar') }}</small>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mt-2" width="100%">Xử lý</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@stop
