@extends('layout.app_fronted')
@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <tr>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($user as $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->phone}}</td>
                        <td><a href="{{URL::to('edit-address',$value->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </table>
             <a href="{{URL::to('add-address')}}"><button class="btn btn-primary">Thêm địa chỉ</button></a>
            </div>
        </div>
    </div>
@stop
