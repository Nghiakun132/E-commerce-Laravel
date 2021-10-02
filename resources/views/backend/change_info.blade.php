@extends('layout.app_backend')
@section('content')
@section('title', 'Xem thông tin')

{{-- <div class="container-fluid">
    <div class="content">
        <div class="row">

            <div class="col-md-8">
                <form action="{{ URL::to('admin/change', $info->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control" value="{{ $info->name }}"
                            aria-describedby="helpId">
                        @if ($errors->first('name'))
                            <small id="helpId" class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $info->email }}"
                            aria-describedby="helpId">
                        @if ($errors->first('email'))
                            <small id="helpId" class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" value="{{ $info->password }}"
                            aria-describedby="helpId">
                        @if ($errors->first('password'))
                            <small id="helpId" class="text-danger ">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" value="{{ $info->address }}"
                            aria-describedby="helpId">
                        @if ($errors->first('address'))
                            <small id="helpId" class="text-danger">{{ $errors->first('address') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ $info->phone }}"
                            aria-describedby="helpId">
                        @if ($errors->first('phone'))
                            <small id="helpId" class="text-danger">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="avatar">
                        <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Xử lý</button>
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</div> --}}
<div class="main-panel">
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('public/img/damir-bosnjak.jpg')}}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                                <img class="avatar border-gray" src="{{ url_file3($info->avatar) }}" alt="{{$info->name}}">
                                <h5 class="title">{{$info->name}}</h5>
                            <p class="description">
                                {{$info->email}}
                            </p>
                        </div>
                        <p class="description text-center">
                            "I like the way you work it <br>
                            No diggity <br>
                            I wanna bag it up"
                        </p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-6 ml-auto">
                                    <h5>{{$count_imported}}<br><small>Phiếu nhập hàng</small></h5>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5>{{$count_order}}<br><small>Đơn hàng đã xác nhận</small></h5>
                                </div>
                                <div class="col-lg-4 mr-auto">
                                    <h5>{{$count_total}}<br><small>Kiếm được</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Team Members</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            @foreach ($team as $team)
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{url_file3($team->avatar)}}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{$team->name}}
                                        <br />
                                        <span class="text-muted"><small>Offline</small></span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Company (disabled)</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Company"
                                            value="Creative Code Inc.">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username"
                                            value="michael23">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Company" value="Chet">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Home Address"
                                            value="Melbourne, Australia">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="City" value="Melbourne">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" placeholder="Country"
                                            value="Australia">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="number" class="form-control" placeholder="ZIP Code">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea
                                            class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
