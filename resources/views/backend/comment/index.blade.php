@extends('layout.app_backend')
@section('content')
@section('title', 'Bình luận')

<h3>Bình luận</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Bình luận</th>
                    <th>Lượt thích</th>
                    <th>Ngày bình luận</th>
                    <th>Action</th>
                </tr>
                @foreach ($comment as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->name }}</td>
                        <td><img src="{{ url_file($comment->pro_avatar) }}" width="60px" height="60px"
                                class="img-thumbnail" alt="{{ $comment->pro_name }}"></td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->liked }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td><a href="{{URL::to('admin/comment/delete-comment',$comment->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@stop
