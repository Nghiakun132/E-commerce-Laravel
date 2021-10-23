<table class="table table-hover">
    <thead class="text-primary">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Thời gian</th>
            <th>Thời gian cập nhật</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($count > 0)
            @foreach ($menus as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->mn_name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('get_backend.menu.delete', $item->id) }}" class="btn btn-danger">Xóa</a>
                        <a href="{{ route('get_backend.menu.update', $item->id) }}" class="btn btn-warning">Cập nhật</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">
                    <h3 style="font-weight: bold" class="text-success text-center">Không có menu bài viết
                    </h3>
                </td>
            </tr>
        @endif
    </tbody>
</table>
