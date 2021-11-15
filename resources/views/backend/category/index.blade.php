@extends('layout.app_backend')
@section('title', 'Danh sách danh mục')
@section('content')
<style>
    .add-add{
        float: right;
    }
</style>
    <div class="container-fluid">
        <h2>Danh mục sản phẩm</h2>
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Danh mục sản phẩm
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="add-add"><button
                        class="btn btn-success" >Thêm</button></a>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian cập nhật</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->c_name }}</td>
                                <td><img src="{{ url_file($item->c_avatar) }}" width="90px" height="90px"
                                        class="img-thumbnail" alt=""></td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @if ($item->c_status == 1)
                                     <a href="{{URL::to('admin/category/change-status',$item->id)}}"><i style="color:green;font-size: 24px;" class="fas fa-thumbs-up"></i></a>
                                    @else
                                     <a href="{{URL::to('admin/category/change-status',$item->id)}}"><i style="color:red;font-size: 24px;" class="fas fa-thumbs-down"></i></a>
                                     @endif
                                </td>
                                <td>
                                    <a href="{{ route('get_backend.category.delete', $item->id) }}"
                                        onclick="return confirm('Bạn có chắc muốn xóa không')"
                                        class="btn btn-danger delete">Xóa</a>
                                    <a href="{{ route('get_backend.category.update', $item->id) }}"
                                        class="btn btn-primary update">Cập nhật</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('get_backend.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" name="c_name">
                            @if ($errors->first('c_name'))
                                <small class="form-text text-danger"> {{ $errors->first('c_name') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Chọn ảnh từ máy tính</label>
                            <input class="form-control" type="file" id="formFile" name="c_avatar">
                        </div>
                        <button type="submit" class="btn btn-danger mt-2">Xử lý</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <style>


        .heading {
            color: rgb(46, 12, 241);
            font-weight: bold;
            font-size: 44px;
            text-shadow: 0px 0px 3px #610d0d;
            text-align: center;
            animation: nhapnhay 1.5s linear infinite;
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

        .update {
            outline: none;
            border: none;
            animation: nhapnhay1 1.8s linear infinite;
        }

        .delete {
            outline: none;
            border: none;
            animation: nhapnhay2 1.8s linear infinite;

        }

    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="heading">Danh sách danh mục</h2>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="card">
                    <div class="p-3">
                        @include('backend.category.list')
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="card p-3">
                    <h4>Thêm mới || Cập nhật</h4>
                    @include('backend.category.form',['route' => route('get_backend.category.store')])
                </div>
            </div>
        </div>
    </div> --}}
@stop
