<table class="table table-hover table-secondary">
    <thead class="text-danger">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Anh</th>
            <th>Thời gian tạo</th>
            <th>Thời gian cập nhật</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if ($countCategories > 0)
        @foreach($categories as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->c_name}}</td>
            <td><img src="{{url_file($item->c_avatar)}}" width="90px" height="90px" class="img-thumbnail" alt=""></td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td>
                <a href="{{route('get_backend.category.delete',$item->id)}}" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger delete">Delete</a>
                <a href="{{route('get_backend.category.update',$item->id)}}" class="btn btn-primary update">Update</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="8">
                <h3 class="text-succes text-center">Không có danh mục sản phẩm</h3>
            </td>
        </tr>
        @endif
    </tbody>
</table>
