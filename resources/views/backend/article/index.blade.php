@extends('layout.app_backend')
@section('title', 'Danh sách bài viết')
@section('content')
    <h3>Danh sách bài viết<a href="{{ route('get_backend.article.create') }}" class="btn btn-xs btn-success">Thêm bài
            viết</a></h3>
    <div class="card">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Content</th>
                    <th>Time</th>
                    <th>Time update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->a_name }}</td>
                        <td>{{ $item->a_slug }}</td>
                        <td>{{ $item->a_description }}</td>
                        <td>{{ $item->a_content }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ URL::to('admin/article/delete-article', $item->id) }}"><i style="font-size:19px"
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                            <a href="{{ URL::to('admin/article/edit-article', $item->id) }}"><i
                                    style="font-size:19px; margin-left: 12px" class="fa fa-pen"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
