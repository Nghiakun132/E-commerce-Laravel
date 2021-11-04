@extends('layout.app_backend')
@section('title', 'Danh sách bài viết')
@section('content')
    <div class="container-fluid">
        <h2 class="heading">Danh sách bài viết</h2>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><button
                        class="btn btn-primary">Thêm</button></a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Tên bài viết</th>
                            <th>Mô tả</th>
                            <th>Nội dung</th>
                            <th>Thời gian viết</th>
                            <th>Thời gian cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên bài viết</th>
                            <th>Mô tả</th>
                            <th>Nội dung</th>
                            <th>Thời gian viết</th>
                            <th>Thời gian cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($articles as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->a_name }}</td>
                                <td>{{ $item->a_description }}</td>
                                <td>{{ $item->a_content }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a class="nhap" onclick="return confirm('Bạn có chắc muốn xóa không')"
                                        href="{{ URL::to('admin/article/delete-article', $item->id) }}"><i
                                            style="font-size:19px" class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a class="nhap4"
                                        href="{{ URL::to('admin/article/edit-article', $item->id) }}"><i
                                            style="font-size:19px;" class="fa fa-pen" aria-hidden="true"></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <form action="{{ URL::to('admin/article/add-article') }}" method="POST"
                            enctype="multipart/form-data" class="m-3">
                            @csrf
                            <div class="mb-3">
                                <label for="">Tên:</label>
                                <input type="text" class="form-control" name="a_name">
                                @if ($errors->first('a_name'))
                                    <small class="form-text text-danger"> {{ $errors->first('a_name') }}</small>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="">Menu</label>
                                <select name="a_menu_id" class="form-select">
                                    <option value="a_menu_id">
                                        ____Chọn menu____
                                    </option>
                                    @foreach ($menus as $item)
                                        <option value="{{ $item->id }}">{{ $item->mn_name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="">Mô tả</label>
                                <textarea name="a_description" class="form-control " cols="30" rows="3"></textarea>
                                @if ($errors->first('a_description'))
                                    <small class="form-text text-danger"> {{ $errors->first('a_description') }}</small>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="">Nội dung</label>
                                <textarea name="a_content" class="form-control " cols="30" rows="3"></textarea>
                                @if ($errors->first('a_content'))
                                    <small class="form-text text-danger"> {{ $errors->first('a_content') }}</small>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="customFile" class="form-control">Chọn ảnh</label>
                                <input type="file" class="custom-file-input" accept="image/*" id="customFile"
                                    name="a_avatar">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Xử lý</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <a href="{{ route('get_backend.article.create') }}" class="btn btn-xs btn-success mb-2 mb">Thêm bài
        viết</a>
    <div class="container-fluid">
        <div class="table-responsive-md card">
            <div class="p-2">
                <table class="table table-hover table-secondary">
                    <thead class="text-danger">
                        <tr>
                            <th>ID</th>
                            <th>Tên bài viết</th>
                            <th>Mô tả</th>
                            <th>Nội dung</th>
                            <th>Thời gian viết</th>
                            <th>Thời gian cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->a_name }}</td>
                                <td>{{ $item->a_description }}</td>
                                <td>{{ $item->a_content }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a class="nhap" onclick="return confirm('Bạn có chắc muốn xóa không')"
                                        href="{{ URL::to('admin/article/delete-article', $item->id) }}"><i
                                            style="font-size:19px" class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a class="nhap4"
                                        href="{{ URL::to('admin/article/edit-article', $item->id) }}"><i
                                            style="font-size:19px;" class="fa fa-pen" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div> --}}
@stop
