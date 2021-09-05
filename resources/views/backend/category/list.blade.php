<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
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
            <td>{{$item->c_slug}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td>
                <a href="{{route('get_backend.category.delete',$item->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{route('get_backend.category.update',$item->id)}}" class="btn btn-primary">Update</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
