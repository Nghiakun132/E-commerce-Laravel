@extends('layout.app_backend')
@section('title', 'Danh sách bài viết')
@section('content')
<style>
    body {
            background-color: rgba(201, 28, 28, 0.15);
        }
    .heading {
        color: rgb(46, 12, 241);
        font-weight: bold;
        font-size: 44px;
        text-shadow: 0px 0px 3px #610d0d;
        text-align: center;
        animation:nhapnhay 0.8s linear infinite;
    }
    @keyframes nhapnhay{
        from { color: rgb(97, 247, 11); }
        to { color: rgb(9, 24, 241); }

    }
    @keyframes nhapnhay2{
        from { color: rgb(175, 253, 130),
            );
        }
        to { color: rgb(9, 24, 241);
        }
        from { background-color: red}
        to { background-color: rgb(43, 228, 6)}
    }
    .mb{
        margin-left: 16px;
        animation:nhapnhay2 0.9s linear infinite;

    }
    @keyframes nhapnhay3{
        from{color: rgb(247, 9, 9)}
        to { color: rgb(16, 248, 8)}
    }
    @keyframes nhapnhay4{
        from{color: rgb(227, 250, 18)}
        to { color: rgb(245, 12, 140)}
    }
    .nhap{
        animation:nhapnhay3 0.9s linear infinite;
    }.nhap4{
        animation:nhapnhay4 0.9s linear infinite;
    }
</style>
    <h2 class="heading">Danh sách bài viết</h2>
    <a href="{{ route('get_backend.article.create') }}" class="btn btn-xs btn-success mb-2 mb">Thêm bài
        viết</a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <table class="table table-hover table-info">
                        <thead class="text-danger">
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
                                        <a class="nhap" onclick="return confirm('Bạn có chắc muốn xóa không')" href="{{ URL::to('admin/article/delete-article', $item->id) }}"><i
                                                style="font-size:19px" class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a class="nhap4" href="{{ URL::to('admin/article/edit-article', $item->id) }}"><i
                                                style="font-size:19px;" class="fa fa-pen"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@stop
