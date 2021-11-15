@extends('layout.app_fronted')
@section('content')
@section('title', 'Sổ địa chỉ')
<style>
    a:hover i {
        color: rgb(221, 4, 4);
    }

</style>
<div class="container">
    <h3>Địa chỉ giao hàng</h3>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>Địa chỉ</th>
                        <th>Địa chỉ mặc định</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($user as $value)
                    <tr>
                        <td>{{ $value->address }}</td>
                        <td><a href="{{ URL::to('change-address', $value->id) }}">
                                @if ($value->status == 1)
                                    <i class="fa fa-thumbs-up text-success" style="font-size:30px;margin-left:32px"
                                        aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-thumbs-down text-danger" style="font-size:30px;margin-left:32px"
                                        aria-hidden="true"></i>
                                @endif
                            </a></td>
                        <td><a href="{{ URL::to('edit-address', $value->id) }}"><i style="font-size:24px;"
                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{ URL::to('delete-address', $value->id) }}" onclick="return confirm('Bạn có chắc muốn xóa không')"><i class="fa fa-trash"
                                    style="font-size:24px;" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                @endforeach
            </table>
            <a href="" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary">Thêm địa
                    chỉ</button></a>
        </div>
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Thêm địa chỉ</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address_new" class="form-control">
                        <button type="submit" class="btn btn-primary mt-2">Thêm</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@stop
