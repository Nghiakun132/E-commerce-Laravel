@extends('layout.app_fronted')
@section('content')

    <div class="container">
        <hr>
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <h2>Thay đổi địa chỉ</h2>
                {{-- @foreach ($address as $address) --}}
                <form action="{{URL::to('edit',$address->id)}}" method="post">
                    @csrf
                <div class="form-group">
                {{-- {{-- <label for="">Địa chỉ</label> --}}
                <input type="text" name="address_new" class="form-control" value="{{$address->address}}">
                    <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
                </div>
            </form>
                {{-- {{-- @endforeach --}}
            </div>
            <div class="col-lg-3">
            </div>
        </div>
    </div>
@stop
