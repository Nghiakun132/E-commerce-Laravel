@extends('layout.app_fronted')
@section('content')
@section('title','Sổ địa chỉ')
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <tr>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ mặc định</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($user as $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->phone}}</td>
                        <td><a href="{{URL::to('change-address',$value->id)}}">
                            @if ($value->status==1)
                                <i class="fa fa-thumbs-up text-success" style="font-size:30px;margin-left:32px" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-thumbs-down text-danger" style="font-size:30px;margin-left:32px" aria-hidden="true"></i>
                            @endif
                        </a></td>
                        <td><a href="{{URL::to('edit-address',$value->id)}}"><i class="fa fa-pencil mr-2" aria-hidden="true"></i></a>
                        <a href="{{URL::to('delete-address',$value->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </table>
             <a href="{{URL::to('add-address')}}"><button class="btn btn-primary">Thêm địa chỉ</button></a>
            </div>
        </div>
    </div>
@stop
