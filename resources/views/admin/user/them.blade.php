@extends('admin/layout/index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 align="center" style="margin: 3rem;">THÊM NHÂN VIÊN</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/user/them" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" placeholder="Nhập vào username" />
                        </div>

                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" name="name" placeholder="Nhập vào Tên của bạn" />
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input class="form-control" type="password" name="password" placeholder="Nhập vào mật khẩu" />
                        </div>

                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input class="form-control" type="password" name="passwordAgain" placeholder="Nhập lại mật khẩu" />
                        </div>

                        <div class="form-group">
                            <label>Nhà hàng</label>
                            <select name="restaurant" id="">
                                @foreach($allRestaurant as $rs)
                                <option value="{{$rs->id}}">{{$rs->name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Chức vụ: </label>
                            @if(\Illuminate\Support\Facades\Auth::user()->level=='admin')
                            <label class="radio-inline">
                                <input name="level" value="admin" type="radio" checked=""> Admin
                            </label>
                            @endif
                            <label class="radio-inline">
                                <input name="level" value="Quản lý" type="radio"> Quản lý
                            </label>

                            <label class="radio-inline">
                                <input name="level" value="Thu ngân" type="radio"> Thu Ngân
                            </label>

                            <label class="radio-inline">
                                <input name="level" value="Order" type="radio"> Order
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
