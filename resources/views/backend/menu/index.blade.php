@extends('layout.app_backend')
@section('title', 'Danh sách menu')
@section('content')
<style>
    .add-add{
        float: right;
    }
</style>
    <div class="container-fluid">
        <h2>Danh mục bài viết</h2>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Danh mục bài viết
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="add-add"><button class="btn btn-primary">Thêm</button></a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Thời gian</th>
                            <th>Thời gian cập nhật</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Thời gian</th>
                            <th>Thời gian cập nhật</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($menus as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->mn_name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('get_backend.menu.delete', $item->id) }}" class="btn btn-danger">Xóa</a>
                                    <a href="{{ route('get_backend.menu.update', $item->id) }}" class="btn btn-warning">Cập
                                        nhật</a>
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
              <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục bài viết</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{route('get_backend.menu.store')}}" method="POST">
                    @csrf
                <div class="mb-3">
                    {{-- <label for="">Name:</label> --}}
                    <input type="text" class="form-control" placeholder="Name" name="mn_name" value="{{old('mn_name',$menu->mn_name ?? '')}}">
                    @if($errors->first('mn_name'))
                    <small class="form-text text-danger"> {{ $errors->first('mn_name') }}</small>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Xử lý</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>



















    {{-- <style>
    body {
        background-color: rgba(202, 144, 199, 0.329);
    }
    @keyframes nhapnhay{
        from {
            color: red;
        }to {
            color: rgb(24, 236, 52);
        }
    }
    .heading{
        font-size: 44px;
        text-align: center;
        text-shadow: 2px 0px 0px #0c0;
        animation: nhapnhay 1.2s linear infinite;
    }
    .bg{
        background-color: rgba(170, 143, 143, 0.527);
    }
</style> --}}
    {{-- <h2 class="heading">Danh sách menu</h2>
    <div class="row">
        <div class="col-sm-7">
                <div class="p-3 bg card">
                   @include('backend.menu.list')
                </div>
        </div>
        <div class="col-sm-5">
            <div class="card p-3 bg">
                <h3 class="text-danger">Thêm mới || Cập nhật</h3>
               @include('backend.menu.form',['route' => route('get_backend.menu.store')])
            </div>
        </div>
    </div> --}}
@stop
