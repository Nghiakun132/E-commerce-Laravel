@extends('layout.app_backend')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <h3>Danh sách sản phẩm <a href="{{ route('get_backend.product.create') }}" class="btn btn-xs btn-success">Thêm sản
            phẩm</a></h3>
            {{-- <a href="{{URL::to('admin/product/add-img')}}" class="btn btn-xs btn-success ml-2">Thêm hình ảnh sản
                phẩm</a></h3> --}}
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Slug</th>
                <th>Price</th>
                <th>Time</th>
                <th>Time update</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->pro_name }}</td>
                    <td>
                        <img src="{{ url_file($item->pro_avatar) }}" class="img-thumbnail" width="60px" height="60px"
                            alt="">
                    </td>
                    <td>{{ $item->pro_slug }}</td>
                    <td><span>{{ number_format($item->pro_price - $item->pro_price * $item->pro_sale, 0, ',', '.') . ' ' . 'đ' }}</span>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        @if ($item->pro_status == 0)
                            <a href="{{URL::to('admin/product/change-status',$item->id)}}"><i class="fa fa-thumbs-up text-success ml-2" style="font-size:30px" aria-hidden="true"></i></a>
                        @else
                            <a href="{{URL::to('admin/product/change-status',$item->id)}}"><i class="fa fa-thumbs-down text-danger ml-2" style="font-size:30px" aria-hidden="true"></i></a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('get_backend.product.delete', $item->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('get_backend.product.update', $item->id) }}" class="btn btn-primary">Update</a>
                        <a href="{{ route('get_backend.product.add', $item->id) }}" class="btn btn-primary">Thêm ảnh</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
