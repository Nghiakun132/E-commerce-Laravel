@extends('layout.app_backend')
@section('content')
@section('title', 'Bình luận')
<style>
    body {
        background-color: rgba(228, 190, 190, 0.541);
    }
    table tr td ,th{
        text-align: center;
    }
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

    .delete:hover i{
        color: rgb(228, 11, 11) !important;
    }

</style>
<div class="container-fluid">
<h2 class="heading">Bình luận</h2>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
            <a href="" data-bs-toggle="modal" data-bs-target="#myModal"><button class="btn btn-primary">Thêm</button></a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Bình luận</th>
                        <th>Lượt thích</th>
                        <th>Ngày bình luận</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Bình luận</th>
                        <th>Lượt thích</th>
                        <th>Ngày bình luận</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($comment as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->name }}</td>
                        <td><img src="{{ url_file($comment->pro_avatar) }}" width="60px" height="60px"
                                class="img-thumbnail" alt="{{ $comment->pro_name }}"></td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->liked }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa không')" class="delete"
                                href="{{ URL::to('admin/comment/delete-comment', $comment->id) }}"><i
                                    class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
