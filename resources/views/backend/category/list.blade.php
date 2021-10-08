<table class="table table-hover table-secondary">
    <thead class="text-danger">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Time</th>
            <th>Time update</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->c_name}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td>
                <a href="{{route('get_backend.category.delete',$item->id)}}" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger delete">Delete</a>
                <a href="{{route('get_backend.category.update',$item->id)}}" class="btn btn-primary update">Update</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
